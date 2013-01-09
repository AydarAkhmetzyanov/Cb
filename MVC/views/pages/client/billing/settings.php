<h1><?=$title?></h1>
<form method="post" class="form-horizontal">
						<legend>Ваш префикс</legend>
    <span class="help-block">Префикс это начало смс сообщения отсылаемое абонентом. Он необходим для привязки короткого номера к вашему аккаунту. Он состоит из корневого(первый блок символов) и сабпрефикса(на ваш выбор), текст сообщения после префикса не обязателен. Сообщение может иметь вид: "5039 1234" или "5039 1234 text". Пробелы между блоками обязательны.</span>
			<br>			<div class="control-group">
							<label class="control-label">Префикс</label>
							<div class="controls">
								<input disabled type="text" class="span1" value="5039">
                                <input type="text" required maxlength="6" minlength="2" pattern="[0-9A-Za-z]{2,6}" name="prefix" class="span1" value="<?=User::getInstance()->data['prefix']?>" >
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn">Изменить</button>
							</div>
						</div>
					</form>

<form class="form-horizontal">
						<legend>Обработчик</legend>
                        <div class="control-group">
							<label class="control-label">Статичный ответ на СМС или ответ в случае недоступности обработчика</label>
							<div class="controls">
								<input type="text" required value="<?=User::getInstance()->data['staticResponse']?>" placeholder="Ответ">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputEmail">Тип ответа на смс</label>
							<div class="controls">
								<label class="radio">
                                <input onclick="openCompany();" type="radio" name="accountType" id="optionsAccountCompany" value="company">
                                  Статичный ответ
                                    </label>
                                <label class="radio">
                                <input onclick="openPP();" type="radio" name="accountType" id="optionsAccountPP" value="pp">
                                 Динамичный обработчик (при принятии смс, мы отсылаем запрос на ваш обработчик для получения ответного смс)
                                    </label>
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn">Изменить</button>
							</div>
						</div>
					</form>