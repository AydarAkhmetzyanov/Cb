<?php

class OutController extends Controller {
    
	public function index(){
	    $data = array();

        if(((isset($_POST['summ'])) and (User::getInstance()->data['balance']/100>=$_POST['summ']))and($_POST['summ']!=0)){
            Outrequests::add();
        }



        $data['title'] = 'Вывод средств';
		renderView('header', $data);
        renderView('clientMenu', $data);
        renderView('pages/client/console/consoleCMenu', $data);

        $data['Outrequests'] = Outrequests::getForUser(User::getInstance()->data['id']);
        if($data['Outrequests']!=false){
            $data['Outrequests'] = $data['Outrequests']->fetchAll();
        }

		renderView('pages/client/console/out', $data);
        renderView('pages/client/clientNotifyArea', $data);
		renderView('footer', $data);
	}

    public function delete($id){
        Outrequests::delete($id);
        redirect('client/console/out');
	}

}