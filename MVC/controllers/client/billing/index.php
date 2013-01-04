<?php

class IndexController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Доходы';
		renderView('header', $data);
        renderView('clientMenu', $data);
        renderView('pages/client/billing/billingCMenu', $data);
		renderView('pages/client/billing/index', $data);
        renderView('pages/client/clientNotifyArea', $data);
		renderView('footer', $data);
	}
	

}