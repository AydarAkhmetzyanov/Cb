<?php

class outController extends Controller {
    
	public function index(){
	global $db;
	    $data = array();
        $data['title'] = 'Новые заявки';
		renderView('header', $data);
        renderView('adminMenu', $data);
        renderView('pages/admin/users/usersCMenu', $data);
		
         $stmt = $db->prepare('
                select * from `outRequests` where `status`=0 
		    ');
            $stmt->execute();
		 $stmt->setFetchMode(PDO::FETCH_ASSOC);
		 $data['requests']=$stmt;
		 
		
		renderView('pages/admin/users/out', $data);
		
        renderView('pages/admin/footer', $data);
		renderView('footer', $data);
	}
	
	
	
		public function disagree($id){
	global $db;
	    $data = array();
        $data['title'] = 'Новые заявки';
		renderView('header', $data);
        renderView('adminMenu', $data);
        renderView('pages/admin/users/usersCMenu', $data);
		
		    $stmt = $db->prepare("
			    UPDATE `outRequests` SET `status`='3' WHERE `id` = :id
		    ");
            $stmt->execute( array(
                    'id' => $id
				    ));
		
		$stmt = $db->prepare('
			    UPDATE `users` SET `balance`=`balance`+(SELECT `summ` FROM `outRequests` where `id`=:id) WHERE `id` =(SELECT `userId` FROM `outRequests` where `id`=:id)
		    ');
            $stmt->execute( array(
                    'id' => $id
				    ));
		
		
		$stmt = $db->prepare('
			    SELECT id FROM `users` WHERE  `id` =(SELECT `userId` FROM `outRequests` where `id`=:id)
		    ');
            $stmt->execute( array(
                    'id' => $id
				    ));
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$r=$stmt->fetch();
		
		Mail::sendToUserOut($r['id'],'n');
		
		
         $stmt = $db->prepare('
                select * from `outRequests` where `status`=0 
		    ');
            $stmt->execute();
		 $stmt->setFetchMode(PDO::FETCH_ASSOC);
		 $data['requests']=$stmt;
		 
		
		renderView('pages/admin/users/out', $data);
		
        renderView('pages/admin/footer', $data);
		renderView('footer', $data);
	}
	
	


		public function agree($id){
	global $db;
	    $data = array();
        $data['title'] = 'Новые заявки';
		renderView('header', $data);
        renderView('adminMenu', $data);
        renderView('pages/admin/users/usersCMenu', $data);
		
		  $stmt = $db->prepare("
			    UPDATE `outRequests` SET `status`='1' WHERE `id` = :id
		    ");
            $stmt->execute( array(
                    'id' => $id
				    ));
		
         $stmt = $db->prepare('
                select * from `outRequests` where `status`=0 
		    ');
            $stmt->execute();
		 $stmt->setFetchMode(PDO::FETCH_ASSOC);
		 $data['requests']=$stmt;
		 
		 
		 $stmt = $db->prepare('
			    SELECT id FROM `users` WHERE  `id` =(SELECT `userId` FROM `outRequests` where `id`=:id)
		    ');
            $stmt->execute( array(
                    'id' => $id
				    ));
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$r=$stmt->fetch();
		
		Mail::sendToUserOut($r['id'],'y');
		 
		 
		
		renderView('pages/admin/users/out', $data);
		
        renderView('pages/admin/footer', $data);
		renderView('footer', $data);
	}
	
	
	

  

}