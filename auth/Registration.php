<?php
namespace Auth;
/** 
 * @author user
 * 
 */
class Registration {
	public function UserAdd($user, $pass1, $pass2){
		try {  
		  $DBH = new PDO("mysql:host=localhost;dbname=auth", "root", '');
		}  
		
		catch(PDOException $e) {  
	    	echo $e->getMessage();  
		}
		
		
		
		if ($pass1 === $pass2){
			$STH = $DBH->exec("INSERT INTO users (user, pass) VALUES ('$user', '$pass1')");
			//$STH->execute();
		}
	}
	
	public function UserDel(){

	}
}

?>