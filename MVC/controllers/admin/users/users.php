<?php

class UsersController extends Controller {
    
	public function index(){
        if((User::isAuth())and(User::getInstance()->data['accountType']=='admin')){
            echo 'works';
        }
	}

    public function user($id){
        if((User::isAuth())and(User::getInstance()->data['accountType']=='admin')){
            echo 'works';
        }
	}

}