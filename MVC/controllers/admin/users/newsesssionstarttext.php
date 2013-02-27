<?php

class newsesssionstarttextController extends Controller {
    
	public function index(){
	    global $db;
	    $data = array();
        $data['title'] = 'Новые тексты';
		renderView('header', $data);
        renderView('adminMenu', $data);
        renderView('pages/admin/users/usersCMenu', $data);
		
		if(@$_POST['ok']!=""){
		$stmt = $db->prepare("
			    SELECT * FROM `users` WHERE `id`='".$_POST['id']."'
		    ");
		  $stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$table=$stmt->fetch();
	$s_s_t=$table['session_start_new_text'];
	$stmt = $db->prepare("
			    UPDATE users SET `session_start_new_text`='' WHERE id='".$_POST['id']."'
		    ");
        $stmt->execute();
	Mail::sendToUserStartNewText($table['email'],"n",$_POST['text']);
		
		}
         
		$stmt = $db->prepare("
			    SELECT * FROM `users` WHERE `session_start_new_text`!='' 
		    ");
        $stmt->execute();
        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $stmt=FALSE;
        }
        $data['users']=$stmt;
		
		
		renderView('pages/admin/users/newsesssionstarttext', $data);
		
        renderView('pages/admin/footer', $data);
		renderView('footer', $data);
	}

    public function ajax_activatein($id){
        User::activateIn($id);

	}

    public function ajax_activateout($id){
        User::activateOut($id);
	}


    public function agree($id){
	    global $db;
	    $data = array();
        $data['title'] = 'Новые тексты';
		renderView('header', $data);
        renderView('adminMenu', $data);
        renderView('pages/admin/users/usersCMenu', $data);
		
		
		
      	$stmt = $db->prepare("
			    SELECT * FROM `users` WHERE `id`=$id 
		    ");
		  $stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$table=$stmt->fetch();
	$s_s_t=$table['session_start_new_text'];
	$stmt = $db->prepare("
			    UPDATE users SET `session_start_new_text`='', `session_start_text`='".$s_s_t."' WHERE id='".$id."'
		    ");
        $stmt->execute();
	Mail::sendToUserStartNewText($table['email'],"y","");
	
	$stmt = $db->prepare("
			    SELECT * FROM `users` WHERE `session_start_new_text`!='' 
		    ");
        $stmt->execute();
        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $stmt=FALSE;
        }
        $data['users']=$stmt;
	
		
		renderView('pages/admin/users/newsesssionstarttext', $data);
        renderView('pages/admin/footer', $data);
		renderView('footer', $data);
	}
	
	
	
	
	
	  public function disagree($id){
	    global $db;
	    $data = array();
        $data['title'] = 'Новые тексты';
		renderView('header', $data);
        renderView('adminMenu', $data);
        renderView('pages/admin/users/usersCMenu', $data);
		$data['id']=$id;
		renderView('pages/admin/users/newsesssionstarttext_mes', $data);
        renderView('pages/admin/footer', $data);
		renderView('footer', $data);
	}
	


}