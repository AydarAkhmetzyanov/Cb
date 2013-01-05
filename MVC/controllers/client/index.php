<?php

class IndexController extends Controller {
    
	public function index(){
        if(User::getInstance()->data['accountType']=='admin'){
            redirect('admin');
        } else {
            redirect('client/console/');
        }
	}
}