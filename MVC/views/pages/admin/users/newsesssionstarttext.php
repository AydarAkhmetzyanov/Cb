<h1><?=$title?></h1>
                            <?php
                                if($users!=false){
                                    ?>
<table class="table table-striped">
						<thead>
							<tr>
								<th>Email</th>
								<th>Имя</th>
								<th>Фамилия</th>
                                <th>Название проекта</th>
                                <th>Новый текст</th>
								<th>Подтвердить</th>
								<th>Отклонить</th>
							</tr>
						</thead>
						<tbody>
                            <?
                                while($row = $users->fetch()) {
                               ?>
							   <tr>
							   <td><?=$row['email']?></td>
							   <td><?=$row['firstName']?></td>
							   <td><?=$row['secondName']?></td>
							   <td><?=$row['serviceName']?></td>
							    <td><?=$row['session_start_new_text']?></td>
								 <td><a href="/admin/users/newsesssionstarttext/agree/<?=$row['id']?>">Подтвердить</a></td>
								  <td><a href="/admin/users/newsesssionstarttext/disagree/<?=$row['id']?>">Отклонить</a></td>
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