<?php

class LoginController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Авторизация';
		renderView('header', $data);
        renderView('guestMenu', $data);
		renderView('pages/login', $data);
		renderView('footer', $data);
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
        } else {
            $arr = array('error' => 3, 'uid' => 0, 'password' => 0);       
        }
		echo json_encode($arr);
	}

}