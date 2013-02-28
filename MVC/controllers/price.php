<?php

class PriceController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Тарифы СМС Биллинга';
		renderView('header', $data);
        renderView('guestMenu', $data);
        $data['countries'] = Countries::getExCountries()->fetchAll();
		renderView('pages/price', $data);
		renderView('footer', $data);
	}
	
    public function getNumbers($country){
        echo Numbers::getNumbersByCountryJSON($country);
    }

    public function getPrices($number){
        echo Prices::getPricesJSON($number);
    }
}