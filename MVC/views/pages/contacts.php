<div class="container">
	<h1>Контакты</h1>
<br>
<style>
.contacts .span3{
background: #0072C6;
color:white;
padding-left: 10px;
}

</style>
<div class="row contacts">
  <!--<div class="span3"><h3>Телефон</h3><h4><i class="icon-24-Paste icon-white"></i> +7 (902) 738-87-33</h4></div>-->
  <div class="span3"><h3>Почта</h3><h4><i class="icon-24-Message icon-white"></i> info@flybill.ru</h4></div>
  <div class="span3"><h3>ICQ</h3><h4><i class="icon-24-Favorite icon-white"></i> 612450712</h4></div>
</div>
    <div class="row">
 <div class="span12">
     <br>
     <?php
         if(isset($_POST['email'])){
             Mail::sendToSupport($_POST['email'],$_POST['phone'],$_POST['message']);
             ?>
     <h2>Заявка отправлена</h2>
     <?php
         } else {
             ?>
     <form method="POST" class="form-horizontal">
						<legend>Если у Вас есть вопрос, задайте его нам в этой форме. Мы с радостью Вам поможем.</legend>
						<div class="control-group">
							<label class="control-label">Ваш email *</label>
							<div class="controls">
								<input required type="email" name="email" value="<? echo @User::getInstance()->data['email'];?>">
							</div>
						</div>
     <div class="control-group">
							<label class="control-label">Ваш Телефон</label>
							<div class="controls">
								<input type="text" name="phone" value="<? echo @User::getInstance()->data['phone'];?>">
							</div>
						</div>
     <div class="control-group">
							<label class="control-label">Ваше сообщение</label>
							<div class="controls">
								
     <textarea rows="3" required name=message></textarea>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								
								<button type="submit" class="btn">Отправить</button>
							</div>
						</div>
					</form>
     <?php
         }
     ?>
 
 </div> 
</div>
</div>