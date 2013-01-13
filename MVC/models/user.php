<?php

class User extends Model
{

	public $data;
    protected static $instance;

    public static function getInstance() {
        if ( is_null(self::$instance) ) {
            self::$instance = new User ();
        }
        return self::$instance;
    }

    private  function __construct() {
            $this->data = User::getUser($_SESSION['id']);
    }

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
	

    public static function changeResponder(){
        global $db;
        $stmt = $db->prepare('
			    UPDATE `users` SET `staticResponse`=:staticResponse,`dynamicResponder`=:dynamicResponder,`dynamicResponderURL`=:dynamicResponderURL  WHERE `id` = :id
		    ');
        $stmt->execute( array(
                    'id' => $_SESSION['id'],
		            'staticResponse' => $_POST['staticResponse'],
                    'dynamicResponder' => $_POST['dynamicResponder'],
                    'dynamicResponderURL' => $_POST['dynamicResponderURL']
				    ));
                   
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

   public static function getByRealPrefix($rp){
	        global $db;
            $stmt = $db->prepare('
			    SELECT `id`, `email`, `tarif`,`inEnabled`,`dynamicResponder`,`staticResponse`,`dynamicResponderURL`,`isDynamicError` FROM `users` WHERE `realPrefix` = :rp AND `inEnabled`=1
		    ');
            $stmt->execute( array(
		        'rp' => $rp
			));
        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetch();
        } else {
            return 0;
        }
	}

    public static function getUser($id){
	        global $db;
            $stmt = $db->prepare('
			    SELECT * FROM `users` WHERE `id` = :id
		    ');
            $stmt->execute( array(
		        'id' => $id
			));
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetch();
	}
    
    public static function changePrefix(){
        global $db;
        $realPrefix=substr($_POST['prefix'], 0, 3);
        $stmt = $db->prepare('
			    SELECT * FROM `users` WHERE `realPrefix` = :prefix
		    ');
        $stmt->execute( array(
		            'prefix' => $realPrefix
				    ));
       if($stmt->rowCount()>0){
           return 0;
       } else {
            $stmt = $db->prepare('
			    update `users` set `prefix` = :prefix,`realPrefix` = :realPrefix
		    ');
                $stmt->execute( array(
		            'prefix' => $_POST['prefix'],
                    'realPrefix' => $realPrefix
				    ));
                    return 1;
       }
    }

   public static function activateIn($id){
        global $db;

        $stmt = $db->prepare("
			    SELECT * FROM `users` WHERE `id`=:id
		    ");
         $stmt->execute( array(
		            'id' => $id
			));
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $table=$stmt->fetch();
            $prefix=$table['prefix'];
            $realPrefix=$table['realPrefix'];
            $umail=$table['email'];
            if($prefix == NULL){
                $stmt = $db->prepare('
			    SELECT MIN(`users`.`realPrefix`)+1 AS `realPrefix` FROM `users` WHERE `users`.`realPrefix`  NOT IN (SELECT T1.`realPrefix` FROM `users` as T1  JOIN `users` as T2  on T1.`realPrefix` + 1 = T2.`realPrefix` )
		         ');
         $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $table=$stmt->fetch();
            $realPrefix=$table['realPrefix'];

                $stmt = $db->prepare('
			    UPDATE `users` SET `inEnabled`=1,`prefix`=:prefix, `realPrefix` = :realPrefix WHERE `id` = :id
		        ');
                $stmt->execute( array(
		            'id' => $id,
                    'prefix' => $realPrefix,
                    'realPrefix' => $realPrefix
				    ));
            } else {
                $stmt = $db->prepare('
			    UPDATE `users` SET `inEnabled`=1 WHERE `id` = :id
		        ');
                $stmt->execute( array(
		            'id' => $id
				    ));
            }

            Mail::sendInMessage($umail,$realPrefix);

        
        
        
   }

   public static function activateOut($id){
        global $db;
        $stmt = $db->prepare('
			    UPDATE `users` SET `outEnabled`=1 WHERE `id` = :id
		    ');
        $stmt->execute( array(
		            'id' => $id
				    ));
                    $stmt = $db->prepare("
			    SELECT * FROM `users` WHERE `id`=:id
		    ");
         $stmt->execute( array(
		            'id' => $id
			));
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $table=$stmt->fetch();
            $umail=$table['email'];
                    Mail::sendOutMessage($umail);
   }

   public static function getNotActivatedINOUT(){
	    global $db;
		$stmt = $db->prepare("
			    SELECT * FROM `users` WHERE `emailActivated`=1 and (`outEnabled`=0 OR `inEnabled`=0)
		    ");
        $stmt->execute();
        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $stmt=FALSE;
        }
        return $stmt;
	}

    public static function checkLoginData($email, $password){
	    global $db;
		$stmt = $db->prepare('
			    SELECT `id`, `password`, `email`, `accountType`, `serviceName`, `emailActivated` FROM `users` WHERE `email` = :email
		    ');
        $stmt->execute( array(
		            'email' => $email
			));
        if($stmt->rowCount()==1){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $table=$stmt->fetch();
            if($table['password'] == md5($password)){
                if($table['emailActivated']==1){
                    $arr = array('error' => 0, 'uid' => $table['id'], 'password' => $table['password']);
                     $_SESSION['id'] = $table['id'];
                     $_SESSION['email'] = $table['email'];
                      $_SESSION['accountType'] = $table['accountType'];
                       $_SESSION['serviceName'] = $table['serviceName'];
                }else{
                    $arr = array('error' => 3, 'uid' => 0, 'password' => 0);
                }
            }else {
                $arr = array('error' => 2, 'uid' => 0, 'password' => 0);
            }
        } else {
            $arr = array('error' => 1, 'uid' => 0, 'password' => 0);
        }
        return $arr;
	}

}

?>