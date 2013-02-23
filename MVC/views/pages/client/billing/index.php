<h1><?=$title?></h1>
<h3>Ваш тариф: 
    
    <?php
        $per=User::getInstance()->data['tarif'];
if($per==90){ 
    echo 'Start 100'; 
} elseif($per==92){
     echo 'Standart 102.5'; 
} elseif($per==94){
     echo 'Premium 105'; 
} else {
     echo $per*1.11; 
}
?>
%
</h3>

<?php
    if(is_array($sms)){
?>
<br><h5><a target="_blank" href="/client/billing/csv">Выгрузить базу всех сообщений в формате csv(excel)</a></h5>
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