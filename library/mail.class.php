<?php

class Mail
{
    
    public static function send($html, $email, $subject) {
         $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
 
         $headers  = "MIME-Version: 1.0\r\n"; 
         $headers .= "Content-type: text/html; charset=utf-8\r\n";
         $headers .= "From: FlyBill <info@flybill.ru>\r\n";
         
         $body="<html> 
    <head> 
        <title>$subject</title> 
    </head> 
    <body>";
    $body.=$html;
    $body.= '</body> 
</html>';

         return mail($email, $subject, $body, $headers);
	}
	
	public static function sendEmailValidation($email, $activateLink) {
        $subject='Регистрация FlyBill.ru';
        $message = ' 
    <img src="http://flybill.ru/flybillSmall.png"><br>
    <h1>FlyBill Регистрация почти завершена!</h1>
        <p><a target="_blank" href="'.$activateLink.'">Завершить регистрацию</a></p> 
    '; 
		return Mail::send($message,$email,$subject);
	}
	
    public static function sendInMessage($email, $prefix) {
        $subject='FlyBill.ru активация';
        $message = '
    <img src="http://flybill.ru/flybillSmall.png"><br>
    <h1>FlyBill Теперь вы можете принимать оплату через смс, ваш префикс: '.$prefix.'.</h1>
        <p><a target="_blank" href="http://flybill.ru/login">Войти в панель управления</a></p> 
    '; 
		return Mail::send($message,$email,$subject);
	}

    public static function sendOutMessage($email) {
        $subject='FlyBill.ru активация';
        $message = '
    <img src="http://flybill.ru/flybillSmall.png"><br>
    <h1>FlyBill Теперь вы можете выводить средства.</h1>
        <p><a target="_blank" href="http://flybill.ru/login">Войти в панель управления</a></p> 
    '; 
		return Mail::send($message,$email,$subject);
	}

    public static function dynamicError($email) {
        $subject='FlyBill.ru ваш обработчик не доступен';
        $message = '
    <img src="http://flybill.ru/flybillSmall.png"><br>
    <h1>FlyBill ваш обработчик не отвечает, в ответ на смс отправляется статичный ответ.</h1>
        <p><a target="_blank" href="http://flybill.ru/login">Войти в панель управления</a></p> 
    '; 
		return Mail::send($message,$email,$subject);
	}

}