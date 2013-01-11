<h1><?=$title?></h1>
<form method="post" class="form-horizontal">
						<legend>Ваш префикс</legend>
    <span class="help-block">Префикс это начало смс сообщения отсылаемое абонентом. Он необходим для привязки короткого номера к вашему аккаунту. Он состоит из предпрефикса(для некоторых нероссийских номеров(конкретно в тарифах)), корневого(первый блок символов) и сабпрефикса(на ваш выбор), текст сообщения после префикса не обязателен. Сообщение может иметь вид: "xxxxyyyy", "xxxxyyyyTEXT", "PPPxxxxyyyy" или "PPPxxxxyyyyTEXT".Где PPP-препрефикс, xxxx-корневой префикс, yyyy-ваш личный префикс,TEXT-оставшийся текст сообщения </span>
			<br>			<div class="control-group">
							<label class="control-label">Префикс</label>
							<div class="controls">
								<input disabled type="text" class="span1" value="5039">
                                <input type="text" required maxlength="6" minlength="2" pattern="[0-9A-Za-z]{2,6}" name="prefix" class="span1" value="<?=User::getInstance()->data['prefix']?>" ><?php if(isset($prefixError)) echo '<span class="help-inline">Префикс занят или неверен</span>'?>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn">Изменить</button>
							</div>
						</div>
					</form>

<form method="post" class="form-horizontal">
						<legend>Обработчик</legend>
                        <div class="control-group">
							<label class="control-label">Статичный ответ на СМС или ответ в случае недоступности обработчика</label>
							<div class="controls">
								<input type="text" class="span4" name="staticResponse" maxlength="60" required value="<?=User::getInstance()->data['staticResponse']?>" placeholder="Ответ">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Тип ответа на смс</label>
							<div class="controls">
								<label class="radio">
                                <input onclick="openStatic();" type="radio" name="dynamicResponder" id="static" value="0">
                                  Статичный ответ
                                    </label>
                                <label class="radio">
                                <input onclick="openDynamic();" type="radio" name="dynamicResponder" id="dynamic" value="1">
                                 Динамичный обработчик (при принятии смс, мы отсылаем запрос на ваш обработчик для получения ответного смс)
                                    </label>
							</div>
						</div>
                          <div class="control-group">
							<label class="control-label">URL обработчика</label>
							<div class="controls">
								<input type="url" class="span4" name="dynamicResponderURL" required value="<?=User::getInstance()->data['dynamicResponderURL']?>" placeholder="http://site.ru/script.php">
							</div>
						</div>


    <span class="help-block">
    
<a href="/doc/">Документация по работе с обработчиком</a>

        

    </span>
	<br>

						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn">Сохранить изменения</button>
							</div>
						</div>
					</form>

<!--<form class="form-horizontal">
<legend>Тест обработчика</legend>
    <div class="control-group">
							<label class="control-label">Номер отправителя</label>
							<div class="controls">
								<input type="text" class="span3" required value="79991111111">
							</div>
						</div>
    <div class="control-group">
							<label class="control-label">Сервисный номер</label>
							<div class="controls">
								<input type="text" class="span4" required value="test">
							</div>
						</div>
    <div class="control-group">
							<label class="control-label">Текст 5039 <?=User::getInstance()->data['prefix']?></label>
							<div class="controls">
								<input type="text" class="span4" required value="test">
							</div>
						</div>
    <p>Result :<span id="testResult">test</span></p>
</form>-->