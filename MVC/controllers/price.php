<?php

class PriceController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Тарифы СМС Биллинга';
		renderView('header', $data);
        renderView('guestMenu', $data);
		renderView('pages/price', $data);
		renderView('footer', $data);
	}
	

}