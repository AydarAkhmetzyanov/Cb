</div>
    <div class="span3">

            <?php if(User::getInstance()->data['inEnabled']==0){ 
                if(User::getInstance()->data['accountType']=='person'){ ?>
        <blockquote class="pull-right">
                <p>Ожидайте активации</p>
         <small>Для активации сервисов нам необходимо проверить ваш сервис на соответствие требованиям, обычно это занимает один рабочий день.</small>
        </blockquote>
                <? } else { ?>
        <blockquote class="pull-right">
                <p><a href="mailto:info@flybill.ru?subject=Activation&body=email:<?=$_SESSION['email']?>">Отправить заявку</a></p>
         <small>Для активации сервисов вам необходимо отправить нам подписанный скан <a href="">заявки</a> на подключение с указанием вашего email</small>
        </blockquote>
                <? }
            } else {?>
		<?	if(strpos($_SERVER['REQUEST_URI'], 'pseudo') === false){ ?>
        <blockquote class="pull-right">
         <p>Ваш префикс: 37056<?=User::getInstance()->data['prefix']?></p>
         <small>Изменить префикс можно в <a href="/client/billing/settings">настройка биллинга</a></small>
        </blockquote>
		
		<? }else{ ?>
	
		
		<? } ?>
            <?php 
            } if(User::getInstance()->data['outEnabled']==0){ 
                if(User::getInstance()->data['accountType']=='person'){ ?>

                <? } else { ?>
        <blockquote class="pull-right">
         <p><a href="">Скачать договор</a></p>
         <small>Для активации вывода средств вам необходимо отправить нам подписанный и заполненный договор по адресу г.Москва Тверская дом5 офис132 индекс345763</small>
        </blockquote>
                <? }
            } ?>
<!-- тут новости-->
    </div>
	</div>
</div>
