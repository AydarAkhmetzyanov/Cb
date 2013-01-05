<?php

class IndexController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Новые заявки';
		renderView('header', $data);
        renderView('adminMenu', $data);
        renderView('pages/admin/users/usersCMenu', $data);
		renderView('pages/admin/users/notifyUsers', $data);
        renderView('pages/admin/footer', $data);
		renderView('footer', $data);
	}

}