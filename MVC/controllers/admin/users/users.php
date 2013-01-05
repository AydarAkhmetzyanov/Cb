<?php

class UsersController extends Controller {
    
	public function index(){
        if((User::isAuth())and(User::getInstance()->data['accountType']=='admin')){
            echo 'works';
        }
	}
}