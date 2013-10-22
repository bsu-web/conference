<?php
namespace System\Auth;
use System\Session\Session;
use PDO;
use System\Auth\Crypter;
use Application\Model\Account;

 /** 
  * @author user
  * 
 */
class Login {
	public function SignIn($user, $pass){
		try {  
			  $DBH = new PDO("mysql:host=localhost;dbname=test", "root", '');
			}  
			
		catch(PDOException $e) {  
		   	echo $e->getMessage();  
		}
			
			$passdb = $DBH->query("SELECT pass, user_id FROM users WHERE user = '$user'");
			$passdb = $passdb->fetch();

			$crypter = new Crypter();
			$pass = $crypter->crypt($pass);
			if ($pass === $passdb['pass']){
				$session = new Session();
				$acc = new Account();
				$acc->setId($passdb["user_id"]);
				$acc->setGroup("USER");
				$user_id = $passdb["user_id"];
				$group_id = $DBH->query("SELECT `group_id` FROM `group` WHERE `user_id` = '$user_id'");
				if($group_id){

					while($arr =  $group_id->fetch()){
						$gr_id = $arr["group_id"];
						$group_name = $DBH->query("SELECT `rule_name` FROM `rulemap` WHERE `rule_id` = '$gr_id'");
						if($group_name){
							$group_name = $group_name->fetch();
							$group_name = $group_name["rule_name"];
							$acc->setGroup($group_name);
						}
					}
				}

				$session->set('acc', $acc);
				return "OK";	
			}
			return "DENIED";
	}
	
	public function SignOut(){
		$session = new Session();
		if($session->get('acc')){
			$session->set('acc', null);
		}

	}
}

?>
