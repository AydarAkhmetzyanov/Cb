<div class="container">
<form id="logInForm" onSubmit="return logIn()" class="form-horizontal">
						<legend><?=$title?></legend>
						<div class="control-group">
							<label class="control-label" for="inputEmail">Email</label>
							<div class="controls">
								<input required type="email" name="email" id="inputEmail" placeholder="Email">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Пароль</label>
							<div class="controls">
								<input required minlength="6" type="password" name="password" id="inputPassword" placeholder="Пароль">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn">Войти</button>
							</div>
						</div>
					</form>
</div>