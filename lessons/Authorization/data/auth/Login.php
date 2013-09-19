<?php
namespace Auth;
use System\Session\Session;
use PDO;
/** 
 * @author user
 * 
 */
class Login {
	public function SignIn($user, $pass){
		try {  
			  $DBH = new PDO("mysql:host=localhost;dbname=auth", "root", '');
			}  
			
		catch(PDOException $e) {  
		   	echo $e->getMessage();  
		}
			
			$passdb = $DBH->query("SELECT pass, user_id FROM users WHERE user = '$user'");
			$passdb = $passdb->fetch();
			
			if ($pass === $passdb['pass']){
				$session = new Session();
				$session->set('user_id', $passdb['user_id']);
			}
			else{
				$session = new Session();
				$session->set('user_id', 'Access Denied');
			}
	}
	
	public function SignOut(){
		$session = new Session();
		if($session->get('user_id')){
			$session->set('user_id', null);
		}

	}
}

?>