<?php

class DocController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Документация по работе с динамичным обработчиком';
		renderView('header', $data);
        renderView('guestMenu', $data);
		renderView('pages/doc', $data);
		renderView('footer', $data);
	}
	

}