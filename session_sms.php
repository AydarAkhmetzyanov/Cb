<?php

//session_sms.php?email=test@flybill.ru&password=test&phone-number=79510665133&service-number=1121

function getAppDir(){
$nurl = $_SERVER['PHP_SELF'];
$nurl = str_replace('index.php', '', $nurl);
return $nurl;
}
function getAppURLDir(){
    if((empty($_SERVER["HTTPS"])) or ($_SERVER["HTTPS"]=='off')) {
        $nurl = 'http://' . $_SERVER['HTTP_HOST'] . getAppDir();
		return $nurl;
    } else {
        $nurl = 'https://' . $_SERVER['HTTP_HOST'] . getAppDir();	    
		return $nurl;
    } 
}
define('APPDIR', getAppURLDir());
define('APPURLDIR', getAppURLDir());
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)));
require_once (ROOT . DS . 'config' . DS . 'main.php');
require_once (ROOT . DS . 'config' . DS . 'db.php');
require_once (ROOT . DS . 'core' . DS . 'autoloader.class.php');
require_once (ROOT . DS . 'core' . DS . 'model.class.php');
spl_autoload_register(array('Autoloader', 'loadLibrary'));
spl_autoload_register(array('Autoloader', 'loadModel'));

//цель: создать сессию
//задачи: 

//определить тип запроса
$data=array();
if(isset($_POST['Username'])){
    $data['email']=$_POST['email'];
    $data['password']=$_POST['password'];
    $data['phone-number']=$_POST['phone-number'];
    $data['service-number']=$_POST['service-number'];
    if(isset($_POST['text'])) $data['text']=$_POST['text'];
} else {
    $data['email']=$_GET['email'];
    $data['password']=$_GET['password'];
    $data['phone-number']=$_GET['phone-number'];
    $data['service-number']=$_GET['service-number'];
    if(isset($_GET['text'])) $data['text']=$_GET['text'];
}

//валидация данных TODO

//авторизация
$userData=User::getByEmailPassword($data['email'],$data['password']);
    if(is_array($userData)){
        if($userData['inEnabled']==1) {
            //success and continue
        } else {
            exit('{"status":"FAILED","data":false,"code":"ACCOUNT_IN_DISABLED","message":"account transactions disabled, contact support"}');
        }
    } else {
        exit('{"status":"FAILED","data":false,"code":"INVALID_LOGIN","message":"auth failed, access denied"}');
    }

//проверка права принимать платежи
if($userData['inEnabled']==1) {
            //success and continue
        } else {
            exit('{"status":"FAILED","data":false,"code":"ACCOUNT_IN_DISABLED","message":"account transactions disabled, contact support"}');
        }

//определение текста исходящего сообщения
$outsmstext=$userData['session_start_text'];
if($userData['session_start_is_ctext']==1) {
            if(isset($data['text'])) $outsmstext=$data['text'];
        }

//запрос к апи
$res = file_get_contents("http://api.re-billing.com/smssubscription/?Username=Fly333&Password=12345p%5B%5Dl%3B'%2C.%2F&ServiceID=6305&PhoneNumber=".$data['phone-number']."&ShortNumber=".$data['service-number']."&ip=92.53.122.16&PseudoText=".$outsmstext);
if($res==FALSE) exit('{"status":"FAILED","data":false,"code":"CONNECT_ERROR","message":"serer connection error"}');

//создание сессии
$result = json_decode($res);

if(!is_object($result)) exit('{"status":"FAILED","data":false,"code":"SERVER_RESULT_ERROR","message":"server result error"}');
if($result->status == 'OK') Sessionsms::createSession($userData,$data,$outsmstext);

//ответ на запрос
echo $res;



