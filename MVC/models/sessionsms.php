<?php

class Sessionsms extends Model
{

    public static function createSession($userData,$data,$outsmstext){
	        global $db;
        

        $stmt = $db->prepare('
                INSERT INTO `session_sms`( `service-number`, `stext`, `client_Id`, `date` ,`phone-number`) 
                VALUES (?,?,?,NOW(),?);
		    ');
            $args=array(
                    $data['service-number'],
                    $outsmstext,
                    $userData['id'],
                    $data['phone-number']
        );  
        $stmt->execute($args);
	}

    public static function closeSession($data){
	        global $db;
        $stmt = $db->prepare('
			    UPDATE `users` SET `balance`=`balance`+ :shareClient ,`isDynamicError`= :isDynamicError WHERE `id` = :client_Id;
		    ');
            
        $stmt->execute( array(
                   
                    'shareClient' => $data['shareClient']*100,
		            'isDynamicError' => $data['isDynamicError'],
                    'client_Id' => $data['client_Id']
				    ));

        $stmt = $db->prepare('
                INSERT INTO `sms`( `service-number`, `operator-id`, `operator`, `text`, `keyword`, `keywordClient`, `client_Id`, `date`, `share`, `shareClient`,`phone-number`) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?);
		    ');
            $args=array(
                    $data['service-number'],
                    $data['operator-id'],
                    $data['operator'],
                    $data['text'],
                    $data['keyword'],
                    $data['keywordClient'],
                    $data['client_Id'],
                    $data['date'],
                    $data['share']*100,
                    $data['shareClient']*100,
                    $data['phone-number']
        );  
        $stmt->execute($args);

	}

    public static function getLastForUser($id){
	        global $db;
            $stmt = $db->prepare('
                select * from `sms` where `client_Id`=:id order by `id` DESC LIMIT 30
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
                select `id`, `service-number`, `phone-number`, `operator-id`, `operator`, `text`, `keywordClient` AS `keyword`, DATE(`date`) AS `date`, REPLACE(FORMAT(`shareClient`/100,2),'.',',') AS `share` from `sms` where `client_Id`=:id order by `id` DESC
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
                select `id`, `service-number`, `phone-number`, `operator-id`, `operator`, `text`, `keywordClient` AS `keyword`, DATE(`date`) AS `date`, `smscost`, REPLACE(FORMAT(`shareClient`/100,2),'.',',') AS `shareClient`, REPLACE(FORMAT(`share`/100,2),'.',',') AS `share` from `sms` order by `id` DESC
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