<div class="container">
	<br>
<div id="contentWrapper" class="wrapper">							  
  <div class="content">

      <legend>Псевдо СМС</legend>
    Пользователь вводит свой номер на сайте, после чего ему приходит смс с инструкцией и регистрируется сессия через API FlyBill, которая привязывает его телефон к вашему аккаунту. За создание сессии списываться сумма 10 копеек c вашего аккаунта.
        Любое ответное СМС считается отправленным вам, таким образом префикс не используется в отличии от Premium SMS. Динамический обработчик ответного смс на вашей стороне такой же как у Premium SMS. <a href="/doc/">Документация по работе с динамическим обработчиком</a>
			<br>	

      <legend>Создание сессии</legend>

      <h4>Пример запроса для создания сессии</h4>
      http://flybill.ru/session_sms.php?email=test@flybill.ru&password=test&phone-number=79510661234&service-number=1121
      <h4>Параметры</h4>
     <p>Параметры могут переданы как GET так и POST методом</p>
      <table class="table">
      <thead>
      <tr>
          <th>
          Параметр
          </th>
          <th>
          Описание
          </th>
          </tr>
      </thead>
      <tbody>
      <tr>
          <td>
          email
          </td>
          <td>
          Ваш email указанный при регистрации
          </td>
          </tr>
          <tr>
          <td>
          password
          </td>
          <td>
          Ваш пароль указанный при регистрации
          </td>
          </tr>
          <tr>
          <td>
          phone-number
          </td>
          <td>
          Номер телефона, на который будет отправлено смс при создании сессии
          </td>
          </tr>
          <tr>
          <td>
          service-number
          </td>
          <td>
          Короткий номер, с которого будет отправлено сообщение. Доступные номера и цены в <a href="/price">тарифах</a>
          </td>
          </tr>
          <tr>
          <td>
          text (необязательный)
          </td>
          <td>
          Текст сообщения при открытии сессии. Вы можете задавать этот параметр только при активации службой поддержки. Для этого напишите нам с указанием причины по которой вам небходим данный параметр. Так же текст сообщения можно задавать в настройках псевдо смс.
          </td>
          </tr>
      </tbody>
      </table>

      <legend>Ответ при создании сессии</legend>
 
    <h4>В случае успешного создания сессии</h4>
{"status":"OK","data":"115758839"}
        <h4>В случае ошибки</h4>
         {"status":"FAILED","data":false,"code":"SMS_LIMIT_EXCEEDED","message":"Too many sms for this abonent"}
   
			<h4>Пример обработки ответа</h4>
      <code>
      $res = file_get_contents("http://flybill.ru/session_sms.php?email=test@flybill.ru&password=test&phone-number=79510661234&service-number=1121");<br>
      $result = json_decode($res);<br>
      if($result->status == 'OK') echo 'сессия создана';
      </code>

</div>
</div>
</div>