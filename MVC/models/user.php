<?php

class User extends Model
{
	
	public static function logOut(){
	    unset($_SESSION['id']);
	}
	
	public static function isAuth(){
	    if(isset($_SESSION['id'])){
		    return true;
		} else {
		    return false;
		}
	}
	
    public static function reg($secret){
        global $db;
        $data = array(
        $_POST['email'],md5($_POST['password']),$_POST['accountType'],$_POST['phone'],$_POST['serviceName'],$_POST['serviceURL'],$_POST['firstName'],$_POST['secondName'],$_POST['WMR'],$_POST['PName'],
        $_POST['PFIO'],$_POST['PINN'],$_POST['POGRN'],$_POST['PSGRN'],$_POST['PSGRD'],$_POST['CName'],$_POST['CINN'],$_POST['CKPP'],$_POST['COGRN'],$_POST['CFIO'],
        $_POST['CFIOR'],$_POST['CPPos'],$_POST['CPDoc'],$_POST['UAddr'],$_POST['UPostAddr'],$_POST['accountNDS'],$_POST['bankName'],$_POST['bankBIK'],$_POST['bankKor'],$_POST['bankAcc'],
        $secret
        );  
        $stmt = $db->prepare('
			    INSERT INTO `users`(`email`, `password`, `accountType`, `phone`, `serviceName`, `serviceURL`, `firstName`, `secondName`,  `WMR`, `PName`, 
                `PFIO`, `PINN`, `POGRN`, `PSGRN`, `PSGRD`, `CName`, `CINN`, `CKPP`, `COGRN`, `CFIO`, 
                `CFIOR`, `CPPos`, `CPDoc`, `UAddr`, `UPostAddr`, `accountNDS`, `bankName`, `bankBIK`, `bankKor`, `bankAcc`,
                `emailActivationCode`) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
		    ');
            $stmt->execute($data);
    }
	
    public static function regComplete($secret,$email){
        global $db;
        $stmt = $db->prepare('
			    UPDATE `users` SET `emailActivated`=1 WHERE `email` = :email and `emailActivationCode` = :emailActivationCode LIMIT 1
		    ');
        $stmt->execute( array(
		            'email' => $email,
				    'emailActivationCode' => $secret
				    ));
        $stmt = $db->prepare('
			    SELECT `id`, `email`, `accountType`, `serviceName` FROM `users` WHERE `email` = :email
		    ');
        $stmt->execute( array(
		            'email' => $email
				    ));
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
				    $table=$stmt->fetch();
				    $_SESSION['id'] = $table['id'];
                     $_SESSION['email'] = $table['email'];
                      $_SESSION['accountType'] = $table['accountType'];
                       $_SESSION['serviceName'] = $table['serviceName'];
   }

   public static function checkLoginData($email, $password){
	    global $db;
		$stmt = $db->prepare("SELECT id, md5, salt, firstName, secondName, email FROM users WHERE email = :email LIMIT 1");
        $stmt->execute( array('email' => $email) );
		if($stmt->rowCount()==1){
		    $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $table=$stmt->fetch();
            if (md5(md5($password).$table['salt']) == $table['md5']) {
                $arr = array('error' => 0, 'uid' => $table['id'], 'password' => $table['md5']);
				$_SESSION['id'] = $table['id'];
				$_SESSION['firstName'] = $table['firstName'];
				$_SESSION['secondName'] = $table['secondName'];
				$_SESSION['email'] = $table['email'];
				$stmt = $db->prepare("
					SELECT  `companymembership`.`companyId`, `companymembership`.`position`  ,  `companymembership`.`access` ,  `companies`.`name`,`companies`.`plan`
            	    FROM  `companymembership` 
            	    INNER JOIN  `companies` ON  `companymembership`.`companyId` =  `companies`.`id` 
            	    WHERE  `companymembership`.`userId` = :userId
					ORDER BY `companymembership`.`access` DESC
				");
				$stmt->execute( array('userId' => $table['id']) );
				$_SESSION['companyMembershipCount'] = $stmt->rowCount();
				if($stmt->rowCount() > 0){
				    $stmt->setFetchMode(PDO::FETCH_ASSOC);
				    $table=$stmt->fetch();
				    $_SESSION['companyId'] = $table['companyId'];
					$_SESSION['access'] = $table['access'];
					$_SESSION['name'] = $table['name'];
					$_SESSION['maxAccess'] = $table['access'];
					$_SESSION['position'] = $table['position'];
					$_SESSION['plan'] = $table['plan'];
				} else {
				    $_SESSION['access'] = 0;
				}
            } else {
                $arr = array('error' => 2, 'uid' => 0, 'password' => 0);
            }
        }else{
            $arr = array('error' => 1, 'uid' => 0, 'password' => 0);
        }
		return $arr;
	}

}