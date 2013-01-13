<?php

class OutController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Вывод средств';
		renderView('header', $data);
        renderView('clientMenu', $data);
        renderView('pages/client/console/consoleCMenu', $data);
		renderView('pages/client/console/out', $data);
        renderView('pages/client/clientNotifyArea', $data);
		renderView('footer', $data);
	}

    public function delete($id){
        User::activateIn($id);

	}

}