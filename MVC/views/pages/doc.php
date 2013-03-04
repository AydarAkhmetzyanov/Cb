<div class="container">
	<br>
<div id="contentWrapper" class="wrapper">							  
  <div class="content">

      <legend>Premium SMS</legend>
    <span class="help-block">Пользователь отправляет смс на короткий номер и деньги списываются со счета. Есть возможность использовать динамический обработчик смс на вашей стороне. В этом случае вы можете динамически определять ответ на смс.</span>
			<br>		

      <legend>Запрос к динамическому обработчику на вашей стороне</legend>

      <h4>Пример запроса</h4>
      http://flybill.ru/test.php?service-number=1121&phone-number=79510665133&operator-id=264&operator=tatinkom&text=37056101text&keyword=37056101&date=2013-03-04+02%3A20%3A50&share=1.19
      <h4>Параметры</h4>
     <p>Параметры могут быть приняты GET методом</p>
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
          <tr><td>service-number</td><td>Короткий номер, на который отправлено СМС</td></tr>
          <tr><td>phone-number</td><td>Номер телефона, с которого отправлено СМС</td></tr>
          <tr><td>operator</td><td>Имя оператора номера телефона, с которого отправлено СМС</td></tr>
          <tr><td>operator-id</td><td>ID номера телефона, с которого отправлено СМС</td></tr>
          <tr><td>text</td><td>Полный текст СМС включая префикс</td></tr>
          <tr><td>keyword</td><td>Ваш префикс</td></tr>
          <tr><td>date</td><td>Дата сообщения</td></tr>
          <tr><td>share</td><td>Ваше отчисление за смс в рублях</td></tr>
      </tbody>
      </table>

      <legend>Пример кода обработчика</legend>
 <code>
header('Content-type: text/html; charset=utf-8');   <br>
echo "Answer for test message";   
       </code>
    
</div>
</div>
</div>