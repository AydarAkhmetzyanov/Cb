<h1><?=$title?></h1>


						<legend>Псевдо СМС</legend>
    <span class="help-block">Пользователь вводит свой номер на сайте, после чего ему приходит смс с инструкцией и регистрируется сессия через API FlyBill, которая привязывает его телефон к вашему аккаунту. За создание сессии списываться сумма 10 копеек c вашего аккаунта.
        Любое ответное СМС считается отправленным вам, таким образом префикс не используется в отличии от Premium SMS. Динамический обработчик ответного смс на вашей стороне такой же как у Premium SMS. <a href='/doc/pseudo'>Документация по использованию API</a></span>
			<br>	





<form onsubmit="start_text();return false;" id="start_text" class="form-horizontal">
<legend>Отправляемый текст</legend>
    <div class="control-group">
							<label class="control-label">Стартовый текст </label>
							<div class="controls">
								<input name="text" type="text" class="span4" required value="<?=User::getInstance()->data['session_start_text']?>">
							</div>
						</div>
    <div class="control-group">
							<div class="controls">
								<button type="submit" class="btn">Изменить</button>
							</div>
						</div>
    <p><span id="starttextResult"></span></p></form>
	
	
	
	<div id="forma"><? if(User::getinstance()->data['session_start_new_text']!=""){ ?>Вы уже делали заявку <form onsubmit="cancel_new_text();return false;" id="cancel_new_text" class="form-horizontal">
	<div class="controls"><input name="text" type="hidden" required value="ok">
								<button type="submit" class="btn" >Отменить</button>
							</div>  </form>
	<? } ?> </div><p><span id="cancelnewtextResult"></span></p>



<form method="post" class="form-horizontal">
						<legend>Обработчик</legend>
                        <div class="control-group">
							<label class="control-label">Статичный ответ на СМС или ответ в случае недоступности обработчика</label>
							<div class="controls">
								<input type="text" class="span4" name="staticResponse" maxlength="60" required value="<?=User::getInstance()->data['session_staticResponse']?>" placeholder="Ответ">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Тип ответа на смс</label>
							<div class="controls">
								<label class="radio">
                                <input onclick="openStatic();" type="radio" <?php if((User::getInstance()->data['session_dynamicResponder']==0)or(User::getInstance()->data['session_dynamicResponder']==3)){ echo 'checked'; }?> name="dynamicResponder" id="dynamicResponderInput" value="0">
                                  Статичный ответ
                                    </label>
                                <label class="radio">
                                <input onclick="openDynamic();" type="radio" <?php if(User::getInstance()->data['session_dynamicResponder']==1){ echo 'checked'; }?> name="dynamicResponder" id="dynamicResponderInput" value="1">
                                 Динамичный обработчик (при принятии смс, мы отсылаем запрос на ваш обработчик для получения ответного смс)
                                    </label>
							</div>
						</div>
    <div id="dynamicParams" <?php if((User::getInstance()->data['session_dynamicResponder']==0)or(User::getInstance()->data['session_dynamicResponder']==3)){ echo 'style="display: none;"'; }?>>
                          <div class="control-group">
							<label class="control-label">URL обработчика</label>
							<div class="controls">
								<input type="url" class="span4" name="dynamicResponderURL" value="<?=User::getInstance()->data['session_dynamicResponderURL']?>" placeholder="http://site.ru/script.php">
							</div>
                              
						</div>
    <a href="/doc/">Документация по работе с динамическим обработчиком</a>
        </div>

    <span class="help-block">
    


        

    </span>
	<br>

						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn">Сохранить изменения</button>
							</div>
						</div>
					</form>
 <?php if(User::getInstance()->data['session_dynamicResponder']==1){ ?>
<form onsubmit="testResponder();return false;" id="testForm" class="form-horizontal">
<legend>Тест динамического обработчика</legend>
    <div class="control-group">
							<label class="control-label">Текст 37056<?=User::getInstance()->data['prefix']?></label>
							<div class="controls">
								<input name="text" type="text" class="span4" required value="test">
							</div>
						</div>
    <div class="control-group">
							<div class="controls">
								<button type="submit" class="btn">Тест</button>
							</div>
						</div>
    <p><span id="testResult"></span></p>
</form>
<?php } ?>

