<?php

class Agregators extends Model
{

    public static function getAgregators(){
	    global $db;
		$stmt = $db->prepare("
			    SELECT * FROM `agregators`
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