<h1><?=$title?></h1>


						<legend>Описание</legend>
    <span class="help-block">тут должен быть какой то текст как я понял и <a href='/doc/pseudo'>ссылка</a></span>
			<br>	

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
    <a href="/doc/">Документация по работе с обработчиком</a>
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
    <p><span id="starttextResult"></span></p>
</form>
