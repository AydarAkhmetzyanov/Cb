<h2>Добавить цену</h2>
<form id="addPrice" onsubmit="addPrice();return false;" class="form-inline">
    <select id="addedOperator" name="operator" class="span2">
       <?php foreach ($operators as $operator) {
     echo '<option value="'.$operator['short_name'].'">'.$operator['name'].'</option>';
 }
     ?>
						</select>
<div class="input-append"><input required name="cost" type="text" id="addedCost" class="input-small" placeholder="Цена для абонента"><span class="add-on">руб.</span></div>
    <div class="input-append"><input required name="share" type="text" id="addedShare" class="input-small" placeholder="Доход"><span class="add-on">руб.</span></div>
    <input type="hidden" name="number" value="<?=$_POST['number']?>">
  <button type="submit" class="btn">Добавить</button>
</form>
<h2>Стоимость для разных операторов</h2>
<table class="table table-striped">
						<thead>
							<tr>
								<th>Оператор</th>
								<th>Цена для абонента</th>
								<th>Доход</th>
							</tr>
						</thead>
						<tbody id="pricesTableBody">
							
                            <?php foreach ($prices as $price) {?>
                                <tr id="priceRow<?=$price['id']?>"><form id="price<?=$price['id']?>">
								<td><select name="operator" class="span2">
       <?php foreach ($operators as $operator) {
      echo '<option ' ;
     if($price['operator_short_name']==$operator['short_name']) echo 'selected' ;

     echo ' value="'.$operator['short_name'].'">'.$operator['name'].'</option>';
 }
     ?>
						</select></td>
<td><div class="input-append"><input required name="cost" type="text" id="addedCost" class="input-small" value="<?=$price['cost']/100?>" placeholder="Цена для абонента"><span class="add-on">руб.</span></div></td>
   <td> <div class="input-append"><input required name="share" type="text" id="addedShare" class="input-small" value="<?=$price['share']/100?>" placeholder="Доход"><span class="add-on">руб.</span></div></td>
    <input type="hidden" name="number" value="<?=$_POST['number']?>">
<input type="hidden" name="id" value="<?=$price['id']?>">
                                <td>
                                <a class="btn btn-link" onclick="savePrice(<?=$price['id']?>,this);" href="#"><i class="icon-24-Download icon-gray"></i></a>
                                <a class="btn btn-link" onclick="deletePrice(<?=$price['id']?>);" href="#"><i class="icon-24-Delete icon-gray"></i></a>
                                </td>
                                    </form></tr>
                               <? }
     ?>
						</tbody>
					</table>