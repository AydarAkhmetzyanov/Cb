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
         $userData=User::getByRealPrefix(substr(str_replace(' ','',$data['text']), strlen($data['keyword']), 3));
         if(is_array($userData)){
             $data['client_Id']=$userData['id'];
             $data['shareClient']=floor(($data['share']*($userData['tarif']/100))*100)/100;
             if($userData['dynamicResponder']=='1'){
                 $url = $userData['dynamicResponderURL']."?msisdn=".urlencode($data['msisdn']).
                 "&service-number=".$data['service-number']."&operator-id=".
                 urlencode($data['operator-id'])."&operator=".urlencode($data['operator']).
                 "&text=".urlencode($data['text'])."&keyword=$data[keywordClient]&date=".urlencode($data['date']).
                 "&md5key=$data[md5key]&smsid=$data[smsid]&smscost=$data[smscost]&share=".$data['shareClient'];
                 
                 //todo md5 calcultacte and check
                 $response = Smsapi::getResponse($url);
                 if($response==FALSE){
                     header('Content-type: text/html; charset=utf-8');  
                     echo $userData['staticResponse'];
                     if($userData['isDynamicError']==0){
                         Mail::dynamicError($userData['email']);
                         $data['isDynamicError']=1;
                     }
                 } else {
                     $data['isDynamicError']=0;
                     header('Content-type: text/html; charset=utf-8');  
                     echo $response;
                 }
             } else {
                 header('Content-type: text/html; charset=utf-8');  
                 echo $userData['staticResponse'];
                 $data['isDynamicError']=0;
             }
             SMS::insertData($data);
         } else {
             $data['client_Id']=0;
             $data['shareClient']=0;
              header('Content-type: text/html; charset=utf-8');  
                 echo "false";
                 Sms::insertDataLost($data);
         }
	}
	

}