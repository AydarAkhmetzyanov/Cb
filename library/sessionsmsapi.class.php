<?php

class Sessionsmsapi
{

    private static function validateData($data) {
         
         return true;
	}

    public static function processSMS($data) {
         self::validateData($data);            //TODO

         $sessionsms=Sessionsms::getLastByNumber($data['phone-number']);
         if(is_array($sessionsms)){
             $userData=User::getById($sessionsms['id']);
             $data['client_Id']=$userData['id'];
             $data['shareClient']=floor(($data['share']*($userData['tarif']/100))*100)/100;


             if($userData['session_dynamicResponder']=='1'){
                 //начать думать отсюда
                 $url = $userData['dynamicResponderURL']."?service-number=".$data['service-number']."&operator-id=".
                 urlencode($data['operator-id'])."&operator=".urlencode($data['operator']).
                 "&text=".urlencode($data['text'])."&keyword=$data[keywordClient]&date=".urlencode($data['date']).
                 "&share=".$data['shareClient'];
                 $response = self::getResponse($url);
                 if($response==FALSE){
				     if($userData['isDynamicError']==0){
                         Mail::dynamicError($userData['email']);
                         $data['isDynamicError']=1;
                     }
                     $resultResponse=substr($userData['staticResponse'], 0, 69);
                     SMS::insertData($data);
					 return $resultResponse;
                 } else {
                     $data['isDynamicError']=0;
                     $resultResponse=substr($response, 0, 69);
                     SMS::insertData($data);
					 return $resultResponse;
                 }
             } else {
                 //продолжить думать
                 $resultResponse=substr($userData['staticResponse'], 0, 69);
                 $data['isDynamicError']=0;
                 SMS::insertData($data);
				 return $resultResponse;
             }


             //update sms and user
         } else {
             Sessionsms::insertDataLost($data);
             $resultResponse='session not found';
			 return $resultResponse;
         }

	}
    
	

}