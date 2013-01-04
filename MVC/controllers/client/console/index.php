<?php

class IndexController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Ваш аккаунт FlyBill';
		renderView('header', $data);
        renderView('clientMenu', $data);
        renderView('pages/client/console/consoleCMenu', $data);
		renderView('pages/client/console/index', $data);
        renderView('pages/client/clientNotifyArea', $data);
		renderView('footer', $data);
	}
	

}