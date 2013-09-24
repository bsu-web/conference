<?php
namespace Application\Command;

use PDO;

class CreateMessage extends \System\Core\Command{
	public function exec(){		
		try {  
			$DBH = new PDO("mysql:host=localhost;dbname=test", "root", '');
			$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e) {  
		   	echo $e->getMessage();  
		}
		$text=$_POST['text'];
		$author=$_POST['author'];
		$group_id=$_POST['group_id'];
		$time=date("Y-m-d H:i:s");
		$STH=$DBH->query("INSERT INTO `message` (`author`, `text`, `group_id`, `datetime`) VALUES ('$author', '$text', '$group_id', '$time')");

		return $this->forward("ShowMessageGroup", array("mgid" => $group_id));
	}
}