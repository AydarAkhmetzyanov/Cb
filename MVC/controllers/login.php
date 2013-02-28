<?php

class LoginController extends Controller {
    
	public function index(){
        if(!(User::isAuth())){
	    $data = array();
        $data['title'] = 'Авторизация';
		renderView('header', $data);
        renderView('guestMenu', $data);
		renderView('pages/login', $data);
		renderView('footer', $data);
        } else {
            redirect('client');
        }
	}
	
    public function logout(){
        User::logOut();
	    $data = array();
        $data['title'] = 'Авторизация';
		renderView('header', $data);
        renderView('guestMenu', $data);
		renderView('pages/login', $data);
		renderView('footer', $data);
	}

    public function login(){
	    if(isset($_POST['email']) && isset($_POST['password'])){
		    $arr = User::checkLoginData($_POST['email'], $_POST['password']);
            echo json_encode($arr);
        }
	}

}