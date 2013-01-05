<?php

class IndexController extends Controller {
    
	public function index(){
        if((User::isAuth())and(User::getInstance()->data['accountType']=='admin')){
            redirect('admin/users/');
        }
	}
}