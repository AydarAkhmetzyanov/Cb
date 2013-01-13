<?php

class Sms extends Model
{

    public static function insertData($data){
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
                INSERT INTO `sms`( `msisdn`, `service-number`, `operator-id`, `operator`, `text`, `keyword`, `keywordClient`, `client_Id`, `date`, `smsid`, `smscost`, `share`, `shareClient`) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);
		    ');
            $args=array(
                    $data['msisdn'],
                    $data['service-number'],
                    $data['operator-id'],
                    $data['operator'],
                    $data['text'],
                    $data['keyword'],
                    $data['keywordClient'],
                    $data['client_Id'],
                    $data['date'],
                    $data['smsid'],
                    $data['smscost']*100,
                    $data['share']*100,
                    $data['shareClient']*100
        );  
        $stmt->execute($args);

	}

    public static function insertDataLost($data){
	        global $db;
        $stmt = $db->prepare('
                INSERT INTO `sms`( `msisdn`, `service-number`, `operator-id`, `operator`, `text`, `keyword`, `keywordClient`, `client_Id`, `date`, `smsid`, `smscost`, `share`, `shareClient`) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);
		    ');
            $args=array(
                    $data['msisdn'],
                    $data['service-number'],
                    $data['operator-id'],
                    $data['operator'],
                    $data['text'],
                    $data['keyword'],
                    0,
                    0,
                    $data['date'],
                    $data['smsid'],
                    $data['smscost']*100,
                    $data['share']*100,
                    0
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
                select `id`,`msisdn`, `service-number`, `operator-id`, `operator`, `text`, `keywordClient` AS `keyword`, `date`, `smsid`, REPLACE(FORMAT(`smscost`/100,2),'.',',') AS `smscost`, REPLACE(FORMAT(`shareClient`/100,2),'.',',') AS `share` from `sms` where `client_Id`=:id order by `id` DESC LIMIT 30
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

}