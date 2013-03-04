<?php

class SettingsController extends Controller {
    
	public function index(){
        $data = array();

        

        if(isset($_POST['staticResponse'])){
            $res=User::sessionchangeResponder();
        }


        $data['title'] = 'Настройки';
		renderView('header', $data);
        renderView('clientMenu', $data);
        renderView('pages/client/pseudo/billingCMenu', $data);
		renderView('pages/client/pseudo/settings', $data);
        renderView('pages/client/clientNotifyArea', $data);
		renderView('footer', $data);
	}
	
    public function test(){
        $url = User::getInstance()->data['session_dynamicResponderURL']."?msisdn=79510665133&service-number=1231&operator-id=10155&operator=nss&text=".urlencode($_POST['text'])."&keyword=5039&date=".urlencode('2013-01-11 10:23:01')."&md5key=24d794dfc756320ffadb905d526299bc&smsid=2200610&smscost=100&share=100";
                 $response = sessionsmsapi::processSMS($url);
                 
                 if($response==FALSE){
                     echo "Произошла ошибка либо обработчик недоступен<br>";
                     echo "Запрос: $url";
                 } else {
                     echo "Ответ: ".$response."<br>";
                     echo "Запрос: $url";
                 }
	}
	
	
	
	
	
	   public function start_text(){
      
	  if($_POST['text']!=''){
	  
	  global $db;
	  
	  $stmt = $db->prepare("
			    SELECT `session_start_text` FROM `users` WHERE id='".User::getInstance()->data['id']."'
		    ");
	  $stmt->execute();
	  $stmt->setFetchMode(PDO::FETCH_ASSOC);
		 $s_s_t=$stmt->fetch();;
	  
	  if($s_s_t['session_start_text']==$_POST['text']){
	   echo "Измените текст";
	  }else{
	  $stmt = $db->prepare("
			    UPDATE `users` SET `session_start_new_text`='".$_POST['text']."' WHERE id='".User::getInstance()->data['id']."'
		    ");
	  $stmt->execute();
	  
	  echo "Ваша заявка отправлена";
	  }
	  }else{
	  
	  echo "Заполните поле";
	  }
                 
                 
	}
	
	
	
	 public function cancel_new_text(){
      
	  if($_POST['text']=='ok'){
	  
	  global $db;
	  $stmt = $db->prepare("
			    UPDATE `users` SET `session_start_new_text`='' WHERE id='".User::getInstance()->data['id']."'
		    ");
	  $stmt->execute();
	  
	  echo "Отменено";
	  }
                 
                 
	}
	
	
	

}