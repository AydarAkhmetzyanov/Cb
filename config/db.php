<?php

try {
//$creatives_siteDB = new PDO("mysql:host=localhost;dbname=flybill", 'root', 'usbw', 
$db = new PDO("mysql:host=92.53.122.16;dbname=creatives_fly", 'creatives_fly', 'flypsw',
  array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8;"
  ));

}
catch(PDOException $e) { 
    echo $e->getMessage();
	exit();
}