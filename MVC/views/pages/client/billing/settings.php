<h1><?=$title?></h1>


						<legend>Premium SMS</legend>
    <span class="help-block">Пользователь отправляет смс на короткий номер и деньги списываются со счета. Есть возможность использовать динамический обработчик смс на вашей стороне. В этом случае вы можете динамически определять ответ на смс. <a href="/doc/">Документация по работе с динамическим обработчиком</a></span>
			<br>	

<?php if(User::getInstance()->data['inEnabled']==1){ ?>
<form method="post" class="form-horizontal">
						<legend>Ваш префикс</legend>
    <span class="help-block">Префикс это начало смс сообщения отсылаемое абонентом. Он необходим для привязки короткого номера к вашему аккаунту. Он состоит из предпрефикса(для некоторых нероссийских номеров(конкретно в тарифах)), корневого(первый блок символов) и сабпрефикса(на ваш выбор), текст сообщения после префикса не обязателен. Сообщение может иметь вид: "xxxxyyyy", "xxxxyyyyTEXT", "PPPxxxxyyyy" или "PPPxxxxyyyyTEXT".Где PPP-препрефикс, xxxx-корневой префикс, yyyy-ваш личный префикс,TEXT-оставшийся текст сообщения </span>
			<br>	
    		<?php if(User::getInstance()->data['realPrefix']!=User::getInstance()->data['prefix']){ ?>
    <p>Вам так же доступен префикс: 37056<?=User::getInstance()->data['realPrefix']?></p>
    <?php } ?>
    <div class="control-group">
							<label class="control-label">Префикс</label>
							<div class="controls">
								<input disabled type="text" class="span1" value="37056">
                                <input type="text" required maxlength="7" minlength="3" pattern="[0-9A-Za-z]{3,7}" name="prefix" class="span1" value="<?=User::getInstance()->data['prefix']?>" >
                             <?php if(isset($prefixError)) echo '<span class="help-inline">Префикс занят или неверен</span>'?>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn">Изменить</button>
							</div>
						</div>
					</form>
<?php } ?>
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
                                <input onclick="openStatic();" type="radio" <?php if((User::getInstance()->data['dynamicResponder']==0)or(User::getInstance()->data['dynamicResponder']==3)){ echo 'checked'; }?> name="dynamicResponder" id="dynamicResponderInput" value="0">
                                  Статичный ответ
                                    </label>
                                <label class="radio">
                                <input onclick="openDynamic();" type="radio" <?php if(User::getInstance()->data['dynamicResponder']==1){ echo 'checked'; }?> name="dynamicResponder" id="dynamicResponderInput" value="1">
                                 Динамичный обработчик (при принятии смс, мы отсылаем запрос на ваш обработчик для получения ответного смс)
                                    </label>
							</div>
						</div>
    <div id="dynamicParams" <?php if((User::getInstance()->data['dynamicResponder']==0)or(User::getInstance()->data['dynamicResponder']==3)){ echo 'style="display: none;"'; }?>>
                          <div class="control-group">
							<label class="control-label">URL обработчика</label>
							<div class="controls">
								<input type="url" class="span4" name="dynamicResponderURL" value="<?=User::getInstance()->data['dynamicResponderURL']?>" placeholder="http://site.ru/script.php">
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
 <?php if(User::getInstance()->data['dynamicResponder']==1){ ?>
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