<h1><?=$title?></h1>
                            <form action="/admin/users/newsesssionstarttext" method="post">
							<textarea name="text"></textarea>
							<input type="hidden" name="id" value="<?=$id?>">
							<input type="submit" name="ok" value="Отправить">
							</form>