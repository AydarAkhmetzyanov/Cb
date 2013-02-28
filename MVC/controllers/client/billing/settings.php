<?php

class SettingsController extends Controller {
    
	public function index(){
        $data = array();

        if(isset($_POST['prefix'])){
            $res=User::changePrefix();
            if($res==0){
                $data['prefixError']=0;
            }
        }

        if(isset($_POST['staticResponse'])){
            $res=User::changeResponder();
        }


        $data['title'] = 'Настройки';
		renderView('header', $data);
        renderView('clientMenu', $data);
        renderView('pages/client/billing/billingCMenu', $data);
		renderView('pages/client/billing/settings', $data);
        renderView('pages/client/clientNotifyArea', $data);
		renderView('footer', $data);
	}
	
    public function test(){
        $url = User::getInstance()->data['dynamicResponderURL']."?msisdn=79510665133&service-number=1231&operator-id=10155&operator=nss&text=".urlencode($_POST['text'])."&keyword=5039".User::getInstance()->data['prefix']."&date=".urlencode('2013-01-11 10:23:01')."&md5key=24d794dfc756320ffadb905d526299bc&smsid=2200610&smscost=100&share=100";
                 $response = Smsapi::getResponse($url);
                 
                 if($response==FALSE){
                     echo "Произошла ошибка либо обработчик недоступен<br>";
                     echo "Запрос: $url";
                 } else {
                     echo "Ответ: ".$response."<br>";
                     echo "Запрос: $url";
                 }
	}

}