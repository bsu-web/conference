<?php
namespace Application\Command;

use System\Session\Session;
use PDO;

class MessageSystemGroupToCreate extends \System\Core\Command{
	public function exec(){
		$session = new Session();
		$user_id = $session->get('user_id');

		$DBH=\System\Core\DbConn::getPDO();

		//Получаем список контактов
		$STH=$DBH->query("SELECT `users`.`user_id`, `account`.`name`, `account`.`family` FROM `users` JOIN `account` ON `users`.`user_id` = `account`.`id` WHERE `users`.`user_id` NOT LIKE '$user_id'");
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		$users=array();
		while($row=$STH->fetch())
			$users[]=$row;
		
		$factoryAccount = \System\Orm\PersistenceFactory::getFactory('Account');
		$finderAccount = new \System\Orm\DomainObjectAssembler($factoryAccount);
		$idobjAccount = $factoryAccount->getIndentityObject();
		$idobjAccount->field('id')->eq($user_id);
		$user = $finderAccount->findOne($idobjAccount);
		
		return $this->render(array('user' => $user, 'users' => $users));
	}
}		