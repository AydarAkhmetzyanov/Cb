<?php

class SettingsController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Настройки';
		renderView('header', $data);
        renderView('clientMenu', $data);
        renderView('pages/client/billing/billingCMenu', $data);
		renderView('pages/client/billing/settings', $data);
        renderView('pages/client/clientNotifyArea', $data);
		renderView('footer', $data);
	}
	

}