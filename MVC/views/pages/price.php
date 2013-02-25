<div class="container">
    <div class="row">
        <div class="span3">
        
        
						<fieldset>
							<label>Выберите страну</label>
							<select onChange="countrySelected()" id="countrySelect">
                                <?php foreach ($countries as $row) {//todo exiting countries
     echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
 }
     ?>
							</select>
                            <label>Выберите короткий номер</label>
						</fieldset>
        <table class="table table-hover table-striped">
  <thead><tr><th>Короткий номер</th><th>Цена для абонента</th><th>Предпрефикс</th></tr></thead>
            <tbody id="numbersTBody"></tbody>
</table>

        </div>
        <div class="span9">
        <h1>Расценки для основных операторов</h1>
            <p>Для остальных операторов страны, стоимость и доход примерно равны средней стоимости для номера</p>

<p>* Цены по КН указанны с НДС.</p>

<p>Внимание, информация для абонентов МТС!
Стоимость доступа к услугам контент-провайдера устанавливается Вашим оператором. Подробную информацию можно узнать:
- в разделе «Услуги по коротким номерам» на сайте www.mts.ru
- в контактном центре по телефону 8 800 333 0890 (0890 для абонентов МТС).</p>

        <table class="table table-striped">
  <thead>
            <tr>
            <th rowspan="2">Оператор</th> <th rowspan="2">Цена для абонента</th><th>Ваш доход</th>
        </tr>
            </thead>
            <tbody id="pricesTBody">
                
            </tbody>
</table>
        
        
        
        
        
        
        
        </div>
        </div>
</div>