<?php if(User::getInstance()->data['outEnabled']==1){ ?>
<h2><?=$title?></h2>
<form method="post" class="form-inline">
    <div class="input-append">
						<input required pattern="\d+(\.\d{1,2})?" name="summ" type="text" value="<?=User::getInstance()->data['balance']/100?>" class="input-small" placeholder="Сумма"><span class="add-on">руб.</span>
        </div>
						<button type="submit" class="btn">Отправить заявку</button>
					</form>
<?php } else { echo '<h2>Вывод недоступен</h2>'; } ?>

<?php
    if(is_array($Outrequests)){
?>

<h2>Ваши заявки</h2>
<table class="table table-striped">
						<thead>
							<tr>
								<th>Дата</th>
								<th>Сумма</th>
								<th>Статус</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach ($Outrequests as $row) {
     $summ=$row['summ']/100;
     echo '<tr><td>'.$row['date'].'</td><td>'.$summ.' руб</td><td>';
     if($row['status']==0){ echo 'Ожидание'; } elseif ($row['status']==1){ echo 'Выполнена'; } else { echo 'Отменена'; }
     echo '</td>';
     if($row['status']==0){ echo '<td><a href="/client/console/out/delete/'.$row['id'].'">Удалить заявку</a></td>'; }
     echo '</tr>';
 }
     ?>
							
						</tbody>
					</table>
<?php    } else { ?>
<h4>Нет заявок на вывод</h4>
<?php } ?>