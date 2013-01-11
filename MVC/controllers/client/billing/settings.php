<?php

class SettingsController extends Controller {
    
	public function index(){

        if(isset($_POST['prefix'])){
            if(User::changePrefix()==false){
                $data['prefix']=FALSE;
            }
        }




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