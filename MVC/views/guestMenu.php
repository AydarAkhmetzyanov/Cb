<ul class="nav nav-pills">

				<li id="home"><a href="/">Главная</a></li>
				<li id="contacts"><a href="/contacts">Контакты</a></li>
				<li id="solutions"><a href="/solutions">Решения</a></li>
				<li id="tarif"><a href="/price">Тарифы</a></li>

    <?php
        if(User::isAuth()){
    ?>
    <li class="pull-right"><button style="float:right;" onclick="document.location='/login/logout'" class="btn">Выход</button></li>
    <li class="pull-right"><button style="float:right;" onclick="document.location='/login'" class="btn btn-success">Вернуться</button></li>
    <?php        } else {?>
				<li class="pull-right"><button style="float:right;" onclick="document.location='/reg'" class="btn btn-success">Регистрация</button></li>
                <li class="pull-right"><button style="float:right;" onclick="document.location='/login'" class="btn btn-primary">Вход</button></li>
    <?php        }?>
</ul>
</div>
</div>