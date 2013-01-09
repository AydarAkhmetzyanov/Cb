<h1><?=$title?></h1>
                            <?php
                                if($newUsers!=false){
                                    ?>
<table class="table table-striped">
						<thead>
							<tr>
								<th>Email</th>
								<th>Project</th>
								<th>Type</th>
                                <th>IN</th>
                                <th>OUT</th>
							</tr>
						</thead>
						<tbody>
                            <?
                                while($row = $newUsers->fetch()) {
                                echo '<tr uid="'.$row['id'].'">
                                <td><a href="/admin/users/user/'.$row['id'].'">'.$row['email'].'</a></td>
								<td><a target="_blank" href="'.$row['serviceURL'].'">'.$row['serviceName'].'</a></td>
								<td>'.$row['accountType'].'</td>
                                <td><a onclick="inSend('.$row['id'].',this);">'.$row['inEnabled'].'</a></td>
                                <td><a onclick="outSend('.$row['id'].',this);">'.$row['outEnabled'].'</a></td>
                                </tr>';
                                }
                                ?>
						</tbody>
					</table>
                            <?
                                } else {
                                    echo '<h3>Нет новых пользователей</h3>';
                                }
                            ?>