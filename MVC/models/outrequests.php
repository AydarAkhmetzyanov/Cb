<?php

class Outrequests extends Model
{

public static function getForUser($id){
	        global $db;
            $stmt = $db->prepare('
                select * from `outRequests` where `userId`=:id order by `id` DESC
		    ');
            $stmt->execute( array(
		            'id' => $id
				    ));
       if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $stmt=FALSE;
        }
        return $stmt;
	}

    public static function delete($id){
global $db;
              $stmt = $db->prepare('
			    UPDATE `users` SET `balance`=`balance`+(SELECT `summ` FROM `outRequests` where `id`=:id) WHERE `id` = :uid
		    ');
            $stmt->execute( array(
		            'uid' => User::getInstance()->data['id'],
                    'id' => $id
				    ));



            $stmt = $db->prepare('
                DELETE FROM `outRequests` where `id`=:id AND `userId`=:uid
		    ');
            $stmt->execute( array(
		            'uid' => User::getInstance()->data['id'],
                    'id' => $id
				    ));
            

	}

    public static function add(){
	        global $db;

            $stmt = $db->prepare('
			    UPDATE `users` SET `balance`=`balance`-:summ WHERE `id` = :id
		    ');
        $stmt->execute( array(
                    'id' => $_SESSION['id'],
		            'summ' => $_POST['summ']*100
				    ));

            $data = array(
            $_POST['summ']*100,
            User::getInstance()->data['id']
            );
            $stmt = $db->prepare('
			    INSERT INTO `outRequests`(`summ`,`userId`) VALUES (?,?)
		    ');
            $stmt->execute($data);


	}

}