<?php

class PricesController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Цены';
		renderView('header', $data);
        renderView('adminMenu', $data);
        renderView('pages/admin/prices/pricesCMenu', $data);
        echo "<h1>Цены</h1>";
        $data['numbers'] = Numbers::getNumbers()->fetchAll();
        renderView('pages/admin/prices/selectNumberBlock', $data);

        if(isset($_POST['number'])){
            $data['operators'] = Operators::getOperators($_POST['number'])->fetchAll();
            $data['prices'] = Prices::getPrices($_POST['number']);
            if($data['prices']!=false){
                $data['prices'] = $data['prices']->fetchAll();
            }
            renderView('pages/admin/prices/prices', $data);
        }
        renderView('pages/admin/footer', $data);
		renderView('footer', $data);
	}

    public function csv(){
	    $data['sms'] = Sms::get();
        if($data['sms']!=false){
            $data['sms'] = $data['sms']->fetchAll();
            $csv = new Csv();
            $csv->setHeading('id', 'service-number', 'phone-number', 'operator-id', 'operator', 'text', 'keyword', 'date', 'smscost', 'shareClient', 'share');
            $csv->addData($data['sms']);
            $csv->output('D');
            $csv->clear();
        }
	}

    public function ajax_addprice(){
        Prices::addPrice();
    }

    public function ajax_saveprice(){
        Prices::savePrice();
    }

    public function ajax_deleteprice($id){
        Prices::deletePrice($id);
    }

}