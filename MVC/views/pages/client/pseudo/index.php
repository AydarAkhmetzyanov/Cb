<h1><?=$title?></h1>

<?php
    if(is_array($sms)){
?>
<br><h5><a target="_blank" href="/client/pseudo/csv">Выгрузить базу всех сообщений в формате csv(excel)</a></h5>
<h4>Последние 30 сообщений:</h4>
<table class="table table-condensed table-hovered">
						<thead>
							<tr>
								<th>Дата и время</th>
								<th>Номер телефона</th>
								<th>Короткий номер</th>
                                <th>Отчисление</th>
							</tr>
						</thead>
						<tbody>
								<?php foreach ($sms as $row) {
     $smsprice=$row['smscost']/100;
     $realShare=$row['shareClient']/100;
     echo '<tr><td>'.$row['date'].'</td><td>'.$row['phone-number'].'</td><td>'.$row['service-number'].'</td><td>'.$realShare.'</td></tr>';
 }
     ?>
						</tbody>
					</table>
<?php    } else { ?>
<h4>Вам еще не приходили сообщения</h4>
<?php } ?>