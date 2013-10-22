<?php
namespace System\Auth;
use PDO;
use System\Auth\Crypter;
/** 
 * @author user
 * 
 */
class Registration {

	public function register($user, $pass1, $pass2){
		try {  
		  $DBH = new PDO("mysql:host=localhost;dbname=test", "root", '');
		}  
		
		catch(PDOException $e) {  
	    	echo $e->getMessage();  
		}



		$db = $DBH->query("SELECT user_id FROM users WHERE user = '$user'");
		$db = $db->fetch();
		
		if ($db) {
			return "Login is already taken";	
		}

		if ($pass1 === $pass2){
			$crypter = new Crypter();
			$pass = $crypter->crypt($pass1);
			$STH = $DBH->exec("INSERT INTO users (user, pass) VALUES ('$user', '$pass')");
			return "Registration Complete";
		}
		else {
			return "Passwords are not equal";
		}



	}

}

?>
