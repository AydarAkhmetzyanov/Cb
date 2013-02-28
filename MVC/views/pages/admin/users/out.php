<h1><?=$title?></h1>
                            <?php
                                if($requests!=false){
                                    ?>
<table class="table table-striped">
						<thead>
							<tr>
								
								<th>Имя</th>
                                <th>Дата</th>
								<th>Сумма</th>
								<th>Пользователь</th>
								<th>Подтвердить</th>
								<th>Отклонить</th>
							</tr>
						</thead>
						<tbody>
                            <?
                                while($row = $requests->fetch()) {
                               ?>
							   <tr>
							   <td><? $a=User::getUser($row['userId']); echo $a['firstName']; ?></td>
							   <td><?=$row['date']?></td>
							    <td><?=$row['summ']/100?></td>
								<td><a href="http://flybill.ru/admin/users/user/<?=$a['id']?>">Пользователь</a></td>
								 <td><a href="/admin/users/out/agree/<?=$row['id']?>">Подтвердить</a></td>
								  <td><a href="/admin/users/out/disagree/<?=$row['id']?>">Отклонить</a></td>
							   </tr>
							   
							   <?
                                }
                                ?>
						</tbody>
					</table>
                            <?
                                } else {
                                    echo '<h3>Нет новых пользователей</h3>';
                                }
                           
						    ?>