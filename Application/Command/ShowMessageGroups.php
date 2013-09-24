<?php
namespace Application\Command;

use Auth\Login;
use System\Session\Session;
use PDO;

class ShowMessageGroups extends \System\Core\Command{
	public function exec(){
		$session = new Session();
		$id=$session->get('user_id');	
		
		try {  
			$DBH = new PDO("mysql:host=localhost;dbname=test", "root", '');
			$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}catch(PDOException $e) {  
		   	echo $e->getMessage();  
		}
		$STH=$DBH->query("SELECT `message_group`.`id`, `message_group`.`title` FROM `message_group` WHERE `message_group`.`userset` in (SELECT `userset`.`userset`FROM `userset` WHERE  `userset`.`user`='$id')");
		$STH->bindValue(':user',$id);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		$res=array();
		while($row=$STH->fetch())
			$res[]=$row;
		
		return $this->render(
			array("result" => $res));
	}
}