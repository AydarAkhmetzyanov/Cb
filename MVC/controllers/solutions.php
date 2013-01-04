<?php

class SolutionsController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Области использования СМС биллинга';
		renderView('header', $data);
        renderView('guestMenu', $data);
		renderView('pages/solutions', $data);
		renderView('footer', $data);
	}
	

}