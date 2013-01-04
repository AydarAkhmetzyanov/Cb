<?php

class ContactsController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Контакты';
		renderView('header', $data);
        renderView('guestMenu', $data);
		renderView('pages/contacts', $data);
		renderView('footer', $data);
	}
	

}