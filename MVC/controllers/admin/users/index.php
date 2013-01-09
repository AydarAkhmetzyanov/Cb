<?php

class IndexController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Новые пользователи';
		renderView('header', $data);
        renderView('adminMenu', $data);
        renderView('pages/admin/users/usersCMenu', $data);
        $data['newUsers'] = User::getNotActivatedINOUT();
		renderView('pages/admin/users/notifyUsers', $data);
        renderView('pages/admin/footer', $data);
		renderView('footer', $data);
	}

    public function ajax_activatein($id){
        User::activateIn($id);
	}

    public function ajax_activateout($id){
        User::activateOut($id);
	}

    public function user($id){
	    $data = array();
        $data['title'] = 'Новые пользователи';
		renderView('header', $data);
        renderView('adminMenu', $data);
        renderView('pages/admin/users/usersCMenu', $data);
        print_r( User::getUser($id));
        renderView('pages/admin/footer', $data);
		renderView('footer', $data);
	}

}