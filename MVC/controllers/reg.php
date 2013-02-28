<?php

class RegController extends Controller {
    
	public function index(){
        if(!(User::isAuth())){
	      $data = array();
          $data['title'] = 'Регистрация';
		  renderView('header', $data);
          renderView('guestMenu', $data);
		  renderView('pages/reg', $data);
		  renderView('footer', $data);
        } else {
            redirect('');
        }
	}
	
    public function submit(){
        if(!(User::isAuth())){
	      $data = array();
          $data['title'] = 'Регистрация';
		  renderView('header', $data);
          renderView('guestMenu', $data);
          echo '<div class="container">';
	  	  //print_r($_POST);
          $secret=Passwords::generateString(16);
          User::reg($secret);
          $activateLink='http://flybill.ru/reg/complete/'.$secret.'/'.$_POST['email'];
          Mail::sendEmailValidation($_POST['email'],$activateLink);
          echo "<h1>На вашу почту отправлено письмо подтверждения регистрации, пройдите по ссылке в письме для завершения.</h1>";
          echo '</div>';
		  renderView('footer', $data);
        } else {
            redirect('/');
        }
	}

    public function complete($secret,$email){
        User::regComplete($secret,$email);
        redirect('client');
	}

}