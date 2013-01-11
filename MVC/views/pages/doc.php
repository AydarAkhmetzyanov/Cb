<div class="container">
	<br>
<div id="contentWrapper" class="wrapper">							  
  <div class="content">

URL обработчика это адрес скрипта на вашем сайте который возвращает ответ на смс.<br>
        Пример GET запроса к системе Партнера:<br>
http://ваш_адрес_обработчика?msisdn=7902686**86&service-number=1234&operator-id=10100&operator=ABC&text=Test%20Message&keyword=Test&date=2010-02-04%2017%3A43%3A00&md5key=4f382452f0762360d9f267dfdfcf6ea7&smsid=12345&smscost=10.62&share=4.35
    <br>

<table class="table table-striped table-condensed"> 
    <tbody> 
      <tr><td width="123" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(0, 0, 0); border-top-style: solid; border-top-width: 1pt; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><span style="font-family: Arial; ">Параметр</span></p>
         </td><td width="520" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(0, 0, 0); border-top-style: solid; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><span style="font-family: Arial; ">Комментарий</span></p>
         </td></tr>
     
      <tr><td width="123" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><b><span style="font-family: Arial; ">msisdn</span></b></p>
         </td><td width="520" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><span style="font-family: Arial; ">Номер абонента, приславшего sms-сообщение</span></p>
         </td></tr>
     
      <tr><td width="123" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><b><span style="font-family: Arial; ">service-number</span></b></p>
         </td><td width="520" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><span style="font-family: Arial; ">Короткий номер, на который получено sms-сообщение</span></p>
         </td></tr>
     
      <tr><td width="123" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><b><span style="font-family: Arial; ">operator-id</span></b></p>
         </td><td width="520" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><span style="font-family: Arial; ">Номер оператора, от которого поступило sms-сообщение</span></p>
         </td></tr>
     
      <tr><td width="123" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><b><span style="font-family: Arial; ">operator</span></b></p>
         </td><td width="520" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><span style="font-family: Arial; ">Название оператора, от которого поступило sms-сообщение</span></p>
         </td></tr>
     
      <tr><td width="123" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><b><span style="font-family: Arial; ">text</span></b></p>
         </td><td width="520" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><span style="font-family: Arial; ">Текст sms-сообщения</span></p>
         </td></tr>
     
      <tr><td width="123" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><b><span style="font-family: Arial; ">keyword</span></b></p>
         </td><td width="520" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><span style="font-family: Arial; ">Префикс сообщения</span></p>
         </td></tr>
     
      <tr><td width="123" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><b><span style="font-family: Arial; ">date</span></b></p>
         </td><td width="520" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><span style="font-family: Arial; ">Дата получения sms-сообщения в формате: 2008-10-13 13:30:10</span></p>
         </td></tr>
     
      <tr><td width="123" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><b><span style="font-family: Arial; ">md5key 
                <br>
               </span></b></p>
         </td><td width="520" valign="top" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; "> 
          <p class="a"><span style="font-family: Arial; ">Секретный ключ 
              <br>
             </span></p>
         </td></tr>
     
      <tr><td colspan="1" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "><b><font face="Arial" class="Apple-style-span">smsid</font></b></td><td style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; " colspan="1">ID смс</td></tr>

<tr><td colspan="1" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "><b><font face="Arial" class="Apple-style-span">smscost</font></b></td><td style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; " colspan="1">Стоимость смс для абонента</td></tr>

<tr><td colspan="1" style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: currentcolor; border-right-style: none; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: medium; border-bottom-width: 1pt; border-left-width: 1pt; "><b><font face="Arial" class="Apple-style-span">share</font></b></td><td style="border-bottom-color: rgb(0, 0, 0); border-left-color: rgb(0, 0, 0); border-right-color: rgb(0, 0, 0); border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: currentcolor; border-top-style: none; border-top-width: medium; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; " colspan="1">Размер партнёрского отчисления</td></tr>
    </tbody>
   </table>

* Система всегда передает все указанные параметры<br><br>
 
Пример ответа на GET запрос к системе Партнера.
 
Answer for test message
 
Пример простейшего обработчика PHP, выдающего такой ответ:<br><br>
   <code>
header('Content-type: text/html; charset=utf-8');   <br>
echo "Answer for test message";   
       </code><br><br>
Также в зависимости от сервера возможно использование header('Content-type: text/html; charset=cp1251'); 
Фаил должен иметь кодировку UTF-8 для коректного ответного сообщения в кирилице


</div>
</div>
</div>