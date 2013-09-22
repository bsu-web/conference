<?php
namespace Application\Command;

use PDO;

class CreateMessageGroup extends \System\Core\Command {
	protected function exec(){
		try {  
			$DBH = new PDO("mysql:host=localhost;dbname=auth", "root", '');
			$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}catch(PDOException $e) {  
		   	echo $e->getMessage();  
		}
		$author=$_POST['author'];
		$users=$_POST['users'];
		$STH=$DBH->query("INSERT INTO `userset` (`user`) VALUES ('$author')");
		$id_set = mysql_insert_id();
		foreach($users as $key => $f)
			$STH=$DBH->query("INSERT INTO `userset` (`set`, `user`) VALUES ('$id_set', '$f')");
		
		//return $this->render(array('author' => $author));
	}
}