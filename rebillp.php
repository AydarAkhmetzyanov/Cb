<?php

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

//цель: обработка смс
//задачи: 
//идентификация сессии -
//определение клиента -
//закрытие сессии
//начисление средств
//определение типа ответа
//запрос к динамическому обработчику
//отправка ответа

$cprefix='124542';

$data['service-number']= $_GET['num'];
$data['operator-id']= $_GET['operator_id'];
$data['operator']= $_GET['operator'];
$data['phone-number']= $_GET['user_id'];
$data['text']= $_GET['msg'];
$data['date']= $_GET['date'];
$data['share']= $_GET['cost_rur'];

$smsid = $_GET['smsid'];
echo "content_type:text/plain\n";
echo "smsid:$smsid\n";
echo "status:reply\n\n";
//echo Smsapi::initsmsjoin($data);
echo "\n\n";
