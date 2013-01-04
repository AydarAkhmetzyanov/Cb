<?php

class IndexController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'FlyBill СМС Биллинг';
		renderView('header', $data);
        renderView('guestMenu', $data);
		renderView('pages/index', $data);
		renderView('footer', $data);
	}
	

}