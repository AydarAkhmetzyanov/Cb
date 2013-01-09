<h2>Выберите номер</h2>
<form id="selectNumber" method="POST" class="form-inline">
    <select name="number" class="span3">
       <?php foreach ($numbers as $number) {
     $realPrice=$number['price']/100;
     echo '<option ';
     if(@$_POST['number']==$number['number']){
	 echo 'selected';
	 }
     echo ' value="'.$number['number'].'">'.$number['country'].' '.$number['number'].' '.$realPrice.'руб.</option>';
 }
     ?>
						</select>
  <button type="submit" class="btn">Выбрать</button>
</form>