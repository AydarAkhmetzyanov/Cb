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

$cprefix='769';

$data['keyword'] = $_GET['keyword'];

$data['service-number']= $_GET['service-number'];
$data['operator-id']= $_GET['operator-id'];
$data['operator']= $_GET['operator'];
$data['phone-number']= $_GET['msisdn'];
$data['text']= $_GET['text'];
$data['date']= $_GET['date'];
$data['share']= $_GET['share'];



header('Content-type: text/html; charset=utf-8');
echo Smsapi::initsmsjoin($data);
