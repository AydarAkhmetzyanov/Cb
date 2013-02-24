<?php

class Sessionsmsapi
{

    private static function validateData($data) {
         
         return true;
	}

    public static function processSMS($data) {
         self::validateData($data);            //TODO

         $data['sessionsms']=Sessionsms::getLastByNumber($data['phone-number']);
         if(is_array($data['sessionsms'])){
             $userData=User::getById($data['sessionsms']['client_Id']);
             $data['client_Id']=$userData['id'];
             $data['shareClient']=floor(($data['share']*($userData['tarif']/100))*100)/100;

             if($userData['session_dynamicResponder']=='1'){
                 $url = $userData['session_dynamicResponderURL']."?service-number=".$data['service-number']."&operator-id=".
                 urlencode($data['operator-id'])."&operator=".urlencode($data['operator']).
                 "&text=".urlencode($data['text'])."&date=".urlencode($data['date']).
                 "&share=".$data['shareClient'];
                 $response = Smsapi::getResponse($url);
                 if($response==FALSE){
				     if($userData['session_isDynamicError']==0){
                         Mail::dynamicError($userData['email']);
                         $data['session_isDynamicError']=1;
                     }
                     $resultResponse=substr($userData['session_staticResponse'], 0, 69);
                     Sessionsms::closeSession($data);
					 return $resultResponse;
                 } else {
                     $data['session_isDynamicError']=0;
                     $resultResponse=substr($response, 0, 69);
                     Sessionsms::closeSession($data);
					 return $resultResponse;
                 }
             } else {
                 $resultResponse=substr($userData['session_staticResponse'], 0, 69);
                 $data['session_isDynamicError']=0;
                 Sessionsms::closeSession($data);
				 return $resultResponse;
             }
         } else {
             Sessionsms::insertDataLost($data);
             $resultResponse='session not found';
			 return $resultResponse;
         }

	}
    
	

}