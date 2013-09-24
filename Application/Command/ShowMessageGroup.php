<?php
namespace Application\Command;

use System\Session\Session;
use PDO;

class ShowMessageGroup extends \System\Core\Command{
	public function exec(){
		$mgid=$this->data["mgid"];
		
		try {  
			$DBH = new PDO("mysql:host=localhost;dbname=test", "root", '');
			$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}catch(PDOException $e) {  
		   	echo $e->getMessage();  
		}
		$STH=$DBH->query("SELECT `message_group`.`title` FROM `message_group` WHERE `message_group`.`id`='$mgid'");
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		$row=$STH->fetch();
		$title=$row['title'];
		
		$STH=$DBH->query("SELECT `users`.`name`, `message`.`text`, `message`.`datetime` FROM `message`, `users` WHERE `users`.`user_id` = `message`.`author` AND `message`.`group_id`='$mgid'  ORDER BY `message`.`datetime`");
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		$messages=array();
		while($row=$STH->fetch())
			$messages[]=$row;
			
		$session = new Session();
		$user_id=$session->get('user_id');	
		
		return $this->render(
			array("messages" => $messages, "mgtitle" => $title, "mgid" => $mgid, "user_id" => $user_id));
	}
}