<?php if(User::getInstance()->data['outEnabled']==1){ ?>
<h2><?=$title?></h2>
<form method="post" class="form-inline">
    <div class="input-append">
						<input required pattern="\d+(\.\d{1,2})?" type="text" value="<?=User::getInstance()->data['balance']/100?>" class="input-small" placeholder="Сумма"><span class="add-on">руб.</span>
        </div>
						<button type="submit" class="btn">Отправить заявку</button>
					</form>
<?php } else { echo '<h2>Вывод недоступен</h2>'; } ?>

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
							<tr>
								<td>11 11 11</td>
								<td>156.43 руб</td>
								<td>Waiting</td>
								<td><a href="">Удалить заявку</a></td>
							</tr>
						</tbody>
					</table>