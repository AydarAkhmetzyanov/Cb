<?php

class IndexController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Короткие номера';
		renderView('header', $data);
        renderView('adminMenu', $data);
        renderView('pages/admin/prices/pricesCMenu', $data);
        $data['agregators'] = Agregators::getAgregators()->fetchAll();
        $data['countries'] = Countries::getCountries()->fetchAll();
        
        $data['numbers'] = Numbers::getNumbers();
        if($data['numbers']!=false){
            $data['numbers'] = $data['numbers']->fetchAll();
        }
		renderView('pages/admin/prices/numbers', $data);
        renderView('pages/admin/footer', $data);
		renderView('footer', $data);
	}

    public function ajax_addnumber(){
        Numbers::addNumber();
    }

    public function ajax_savenumber(){
        Numbers::saveNumber();
    }
    public function ajax_deletenumber($id){
        Numbers::deleteNumber($id);
    }

}