<?php
namespace Application\Command;

use System\Session\Session;
use PDO;

class NewMessageGroup extends \System\Core\Command{
	public function exec(){
		$session = new Session();
		$user_id = $session->get('user_id');
		
		try {  
			$DBH = new PDO("mysql:host=localhost;dbname=test", "root", '');
			$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}catch(PDOException $e) {  
		   	echo $e->getMessage();  
		}
		$STH=$DBH->query("SELECT `users`.`user_id`, `users`.`name` FROM `users` WHERE NOT(`users`.`user_id`='$user_id')");
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		$users=array();
		while($row=$STH->fetch())
			$users[]=$row;
		return $this->render(array('user_id' => $user_id, 'users' => $users));
	}
}		