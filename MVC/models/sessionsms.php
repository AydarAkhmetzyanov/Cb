<?php

class Sessionsms extends Model
{

    public static function createSession($userData,$data,$outsmstext){
	        global $db;
        

        $stmt = $db->prepare('
                INSERT INTO `session_sms`( `service-number`, `stext`, `client_Id`, `date` ,`phone-number`,`share`,`shareClient`) 
                VALUES (?,?,?,NOW(),?,-10,-10);
		    ');
            $args=array(
                    $data['service-number'],
                    $outsmstext,
                    $userData['id'],
                    $data['phone-number']
        );  
        $stmt->execute($args);

        $stmt = $db->prepare('
			    UPDATE `users` SET `balance`=`balance`-10 WHERE `id` = :client_Id;
		    ');
            
        $stmt->execute( array(
                    'client_Id' => $userData['id']
				    ));

	}

    public static function closeSession($data){
	        global $db;
        $stmt = $db->prepare('
			    UPDATE `users` SET `balance`=`balance`+ :shareClient ,`session_isDynamicError`= :isDynamicError WHERE `id` = :client_Id;
		    ');
            
        $stmt->execute( array(
                   
                    'shareClient' => $data['shareClient']*100,
		            'isDynamicError' => $data['session_isDynamicError'],
                    'client_Id' => $data['client_Id']
				    ));
        $stmt = $db->prepare('
                UPDATE `session_sms` SET `operator-id`=?,`operator`=?,`text`=?,`share`=?,`shareClient`=?,`payed`=1 
                WHERE `id`=?;
		    ');
          $args=array(
                    $data['operator-id'],
                    $data['operator'],
                    $data['text'],
                    ($data['share']*100)-10,
                    ($data['shareClient']*100)-10,
                    $data['sessionsms']['id']
        );  
        $stmt->execute($args);

	}

    public static function insertDataLost($data){
	        global $db;
        $stmt = $db->prepare('
                INSERT INTO `session_sms`( `service-number`, `operator-id`, `operator`, `text`, `client_Id`, `date`, `smscost`, `share`, `shareClient`, `phone-number`, `payed`, `stext`) 
                VALUES (?,?,?,?,0,NOW(),0,?,0,?,1,0);
		    ');
            $args=array(
                    $data['service-number'],
                    $data['operator-id'],
                    $data['operator'],
                    $data['text'],
                    ($data['share']*100)-10,
                    $data['phone-number']
        );
        $stmt->execute($args);
	}

    public static function getLastUnpayedByNumber($phone){
	    global $db;
        $stmt = $db->prepare('
            select * from `session_sms` where `phone-number`=:phone and `payed`=0 order by `id` DESC LIMIT 1
		');
        $stmt->execute( array(
		    'phone' => $phone
		));
        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetch();
        } else {
            return 0;
	    }
    }


    //change to session
    public static function getLastForUser($id){
	        global $db;
            $stmt = $db->prepare('
                select * from `session_sms` where `client_Id`=:id order by `id` DESC LIMIT 30
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

    public static function getAllForUser($id){
	        global $db;
            $stmt = $db->prepare("
                select `id`, `service-number`, `phone-number`, `operator-id`, `operator`, `text`, DATE(`date`) AS `date`, REPLACE(FORMAT(`shareClient`/100,2),'.',',') AS `share` from `session_sms` where `client_Id`=:id order by `id` DESC
		    ");
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

    public static function get(){
	        global $db;
            $stmt = $db->prepare("
                select `id`, `service-number`, `phone-number`, `operator-id`, `operator`, `text`, DATE(`date`) AS `date`, `smscost`, REPLACE(FORMAT(`shareClient`/100,2),'.',',') AS `shareClient`, REPLACE(FORMAT(`share`/100,2),'.',',') AS `share` from `session_sms` order by `id` DESC
		    ");
            $stmt->execute();
       if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $stmt=FALSE;
        }
        return $stmt;
	}

}