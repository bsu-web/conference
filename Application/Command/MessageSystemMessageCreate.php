<?php
namespace Application\Command;

/**
 * Команда на создание сообщения
 * @author Zalutskii
 * @version 17.10.13
 */

class MessageSystemMessageCreate extends \System\Core\Command{
	public function exec(){		
		$DBH=\System\Core\DbConn::getPDO();
		
		$text = $this->req['text'];
		$id_author = $this->req['author'];
		$id_group = $this->req['group_id'];
		
		//Загрузка файла
		/*
		if(isset($_FILES['uploadfile'])){
			//В будущем будем тянуть из конфига
			$uploaddir = 'C:/files/';
			$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
			$filename = $_FILES['uploadfile']['name'];
			if(is_uploaded_file($_FILES['uploadfile']['tmp_name']))
				move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile);
		}
		*/
		$time = date("Y-m-d H:i:s");
		$STH=$DBH->query("INSERT INTO `message` (`author`, `text`, `datetime`, `file`) VALUES ('$id_author', '$text', '$time', '$filename')");
		$id_message = $DBH->lastInsertId();
		$STH=$DBH->query("INSERT INTO `messagegroup_message` (`messagegroup_id`, `message_id`) VALUES ('$id_group', '$id_message')");

		return $this->forward("MessageSystemGroupShow", array("mgid" => $id_group));
	}
}