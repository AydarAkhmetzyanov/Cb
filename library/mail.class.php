<?php

class Mail
{
    
    public static function send($html, $email, $subject) {
         $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
 
         $headers  = "MIME-Version: 1.0\r\n"; 
         $headers .= "Content-type: text/html; charset=utf-8\r\n";
         $headers .= "From: FlyBill <info@flybill.ru>\r\n";
         
$message = ' 
<html> 
    <head> 
        <title>Birthday Reminders for August</title> 
    </head> 
    <body> 
    <img src="http://flybill.ru/flybillSmall.png"><br>
    <h1>FlyBill Регистрация почти завершена!</h1>
        <p><a target="_blank" href="'.$html.'">Завершить регистрацию</a></p> 
    </body> 
</html>'; 

         return mail($email, $subject, $message, $headers);
	}
	
	public static function sendEmailValidation($email, $activateLink) {
	    $html = $activateLink;
        $subject='Регистрация FlyBill.ru';
		return Mail::send($html,$email,$subject);
	}
	
}