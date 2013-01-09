<?php

class Operators extends Model
{

    public static function getOperators($number){
	    global $db;
        
		$stmt = $db->prepare("
			    SELECT * FROM `operators` WHERE `code`=(SELECT `code` FROM `countries` WHERE `id`=(SELECT `country_id` FROM `numbers` WHERE `number`=:n))
		    ");
        $stmt->execute( array(
		            'n' => $number
				    ));
        if($stmt->rowCount()>0){
            
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $stmt=FALSE;
        }
        return $stmt;
	}


}