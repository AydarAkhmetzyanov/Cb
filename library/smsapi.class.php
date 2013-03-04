<?php

class Smsapi
{
    
    public static function getResponse($url) {
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_HEADER, 0);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_TIMEOUT, 4);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
         $result = curl_exec($ch);
         curl_close($ch);
         return $result;
	}

    private static function validateData($data) {
         
         return true;
	}

    public static function initsmsjoin($data) {
         self::validateData($data);            //TODO
         $data['keywordClient']=substr(str_replace(' ','',$data['text']), 0, 3+strlen($data['keyword']));
         $realPrefix=(substr(str_replace(' ','',$data['text']), strlen($data['keyword']), 3));
         $userData=User::getByRealPrefix($realPrefix);
         if(is_array($userData)){
             $data['client_Id']=$userData['id'];
             $data['shareClient']=floor(($data['share']*($userData['tarif']/100))*100)/100;
             if($userData['dynamicResponder']=='1'){
                 $url = $userData['dynamicResponderURL']."?service-number=".$data['service-number']."&phone-number=".
                 urlencode($data['phone-number'])."&operator-id=".
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
                 $resultResponse=substr($userData['staticResponse'], 0, 69);
                 $data['isDynamicError']=0;
                 SMS::insertData($data);
				 return $resultResponse;
             }
         } else {
             $data['client_Id']=0;
             $data['shareClient']=0;
                 $resultResponse="false";
                 Sms::insertDataLost($data);
				 $resultResponse='error';
				 return $resultResponse;
         }
	}
    
	

}