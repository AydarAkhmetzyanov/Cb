<div class="container">
<div class="row">
    <div class="span3">
    
    </div>
    <div class="span9">
        <h1>Тарифы</h1>
        <p>Ваш тариф изменяется автоматически на основе дохода за последние 7 дней</p>
        <style>
.contacts .span2,.contacts .span3{
background: #0072C6;
color:white;
padding-left: 10px;
}

           .numberSelect {
                cursor: pointer;
            }
</style>
<div class="row contacts">
  <div class="span2"><h3>Start</h3><h4>Стартовый тариф</h4></div>
  <div class="span3"><h3>Standart</h3><h4><i class="icon-24-Favorite icon-white"></i> +3.5% к Start</h4><h4><i class="icon-24-Paste icon-white"></i> > 50 000 руб. в неделю</h4></div>
  <div class="span3"><h3>Premium</h3><h4><i class="icon-24-Favorite icon-white"></i> +6% к Start</h4><h4><i class="icon-24-Paste icon-white"></i> > 100 000 руб. в неделю</h4></div>
</div>
    </div>
	</div>
    <br>
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
        <h2>Расценки для основных операторов</h2>
            <p>Для остальных операторов страны, стоимость и доход примерно равны средней стоимости для номера</p>
        <table class="table table-striped">
  <thead>
            <tr>
            <th rowspan="2">Оператор</th> <th rowspan="2">Цена для абонента</th><th colspan="3">Ваш доход</th>
        </tr>
            <tr>
            <th>Start</th><th>Standart</th><th>Premium</th>
        </tr>
            </thead>
            <tbody id="pricesTBody">
                
            </tbody>
</table>
        
        
        
        
        
        
        
        </div>
        </div>
</div>