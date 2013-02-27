<?php

class IndexController extends Controller {
    
	public function index(){
	    $data = array();
        $data['title'] = 'Доходы';
		renderView('header', $data);
        renderView('clientMenu', $data);
        renderView('pages/client/pseudo/billingCMenu', $data);
        $data['sms'] = Sessionsms::getLastForUser(User::getInstance()->data['id']);
        if($data['sms']!=false){
            $data['sms'] = $data['sms']->fetchAll();
        }
		renderView('pages/client/pseudo/index', $data);
        renderView('pages/client/clientNotifyArea', $data);
		renderView('footer', $data);
	}

    public function csv(){
	    $data['sms'] = Sessionsms::getAllForUser(User::getInstance()->data['id']);
        if($data['sms']!=false){
            $data['sms'] = $data['sms']->fetchAll();
            $csv = new Csv();
            $csv->setHeading('id', 'service-number', 'phone-number', 'operator-id', 'operator', 'text', 'keyword', 'date', 'share');
            $csv->addData($data['sms']);
            $csv->output('D');
            $csv->clear();
        }
	}

	

}