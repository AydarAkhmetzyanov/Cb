<?php

//rebillp.php?date=2013-02-20+21%3A28%3A18&msg=124542A%D0%94%D0%B0&msg_trans=124542ADa&operator_id=264&operator=tatinkom&service_id=6305&user_id=79510665133&smsid=5792081&cost=1.33&cost_usd=0.04&cost_rur=1.33&test=0&num=1121&skey=rebillp

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

$cprefix='124542';

$data['service-number']= $_GET['num'];
$data['operator-id']= $_GET['operator_id'];
$data['operator']= $_GET['operator'];
$data['phone-number']= $_GET['user_id'];
$data['text']= substr($_GET['msg'],strlen($cprefix),strlen($_GET['msg'])-strlen($cprefix));
$data['date']= $_GET['date'];
$data['share']= $_GET['cost_rur'];

$smsid = $_GET['smsid'];
echo "content_type:text/plain\n";
echo "smsid:$smsid\n";
echo "status:reply\n\n";
echo Sessionsmsapi::processSMS($data);
echo "\n\n";
