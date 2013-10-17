<?php
namespace Application\Command;

/**
 * Команда на создание группы сообщений
 * @author Zalutskii
 * @version 17.10.13
 */
class MessageSystemGroupCreate extends \System\Core\Command {
	protected function exec(){
		$DBH = \System\Core\DbConn::getPDO();

		$author = $_POST['author'];
		$users = $_POST['users'];
		$users[] = $author;
		$description = $_POST['description'];
		$title = $_POST['title'];
		$STH = $DBH->query("INSERT INTO `messagegroup` (`message_group_title`, `message_group_description`, `message_group_author`) VALUES ('$title', '$description', '$author')");
		$group_id = $DBH->lastInsertId();
		$STH = $DBH->query("UPDATE `messagegroup` SET `message_group_partners` = '$group_id' WHERE message_group_id = '$group_id'");

		foreach($users as $f){
			$STH=$DBH->query("INSERT INTO `userset` (`userset`, `user`) VALUES ('$group_id', '$f')");
			$STH=$DBH->query("INSERT INTO `message_read` (`user_id`, `messagegroup_id`, `messagecount`) VALUES ('$f', '$group_id', '0')");
			$STH=$DBH->query("INSERT INTO `rules` (`user_id`, `obj_id`, `rule_id`, `obj_type`) VALUES ('$f', '$group_id', 1, 'MessageGroup')");
		}

		return $this->forward("MessageSystemGroupShow", array("mgid" => $group_id));
	}
}