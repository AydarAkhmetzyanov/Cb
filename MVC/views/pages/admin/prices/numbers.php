<h1><?=$title?></h1>
<h2>Добавить номер</h2>
<form id="addNumberForm" onsubmit="addNumber();return false;" class="form-inline">
  <input id="addedNumber" name="number" required type="text" class="input-small" placeholder="номер">
  <div class="input-append"><input required name="price" type="text" id="addedPrice" class="input-small" placeholder="средняя цена"><span class="add-on">руб.</span></div>
    <input name="preprefix" type="text" id="addedPrice" class="input-small" placeholder="predprefix">
    <select name="country" class="span2">
       <?php foreach ($countries as $row) {
     echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
 }
     ?>
						</select>
    <select name="agregator" class="span2">
        <?php foreach ($agregators as $row) {
     echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
 }
     ?>
						</select>
  <button type="submit" class="btn">Добавить</button>
</form>
<h2>Изменить номер</h2>
<table class="table table-striped">
						<thead>
							<tr>
								<th>Номер</th>
								<th>Средняя стоимость</th><th>Предпрефикс</th>
								<th>Страна</th>
								<th>Агрегатор</th>
							</tr>
						</thead>
						<tbody id="numbersTableBody">
							
                                <?php foreach ($numbers as $number) {?>
                                <tr id="numberRow<?=$number['id']?>"><form id="number<?=$number['id']?>">
								<td>
                                    <input required name="number" type="text" value="<?=$number['number']?>" class="input-small" placeholder="номер">
                                 </td>
								<td>
                                  <div class="input-append"><input required value="<?=$number['price']/100?>" name="price" type="text" class="input-small" placeholder="средняя цена"><span class="add-on">руб.</span></div>
                                </td>
                                    <td>
                                 <input value="<?=$number['preprefix']?>" name="preprefix" type="text" class="input-small" placeholder="preprefix">
                                </td>
								<td>
                                <select name="country" class="span2">
      <?php foreach ($countries as $row) {
     echo '<option ' ;
     if($row['id']==$number['country_id']) echo 'selected' ;
     echo ' value="'.$row['id'].'">'.$row['name'].'</option>';
 }
     ?>
						</select>
                                </td>
								<td><select name="agregator" class="span2">
       <?php foreach ($agregators as $row) {
     echo '<option ';
     if($row['id']==$number['agregator_id']) echo 'selected' ;
     echo ' value="'.$row['id'].'">'.$row['name'].'</option>';
 }
     ?>
						</select></td>
                                <td>
                                <a class="btn btn-link" onclick="saveNumber(<?=$number['id']?>,this);" href="#"><i class="icon-24-Download icon-gray"></i></a>
                                <a class="btn btn-link" onclick="deleteNumber(<?=$number['id']?>);" href="#"><i class="icon-24-Delete icon-gray"></i></a>
                                </td>
                                    </form></tr>
                               <? }
     ?>
							
						</tbody>
					</table>