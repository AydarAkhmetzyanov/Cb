<ul class="nav nav-pills">
                <li><a href="/client/billing/">Премиум СМС</a></li>
				<li><a href="/client/pseudo/">Псевдо СМС</a></li>
				<li><a target="_blank" href="mailto:info@flybill.ru?subject=question&body=email:<?=$_SESSION['email']?>">Поддержка</a></li>
				<li><a href="/client/console">Аккаунт <?=User::getInstance()->data['balance']/100?>р.</a></li>

				<li class="pull-right"><button style="float:right;" onclick="document.location='/login/logout'" class="btn btn-link"><i class="icon-16-ArrowHead-Left icon-gray"></i> Выход</button></li>

</ul>
</div>
</div>