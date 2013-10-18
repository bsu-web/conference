<?php
namespace Application\Command;

class MessageSystemGroupShow extends \System\Core\Command{
	public function exec(){		
		$session = new \System\Session\Session();
		
		$factoryuser = \System\Orm\PersistenceFactory::getFactory('Account');
		$finderuser = new \System\Orm\DomainObjectAssembler($factoryuser);
		$idobjuser = $factoryuser->getIndentityObject();
		$idobjuser->field('id')->eq($session->get('user_id'));
		$user = $finderuser->findOne($idobjuser);

		$factory = \System\Orm\PersistenceFactory::getFactory('MessageGroup');
		$finder = new \System\Orm\DomainObjectAssembler($factory);
		$idobj = $factory->getIndentityObject();
		$idobj->field('message_group_id')->eq($this->data["mgid"]);
		$messagegroup = $finder->findOne($idobj);
		
		return $this->render(array("messagegroup" => $messagegroup, "user" => $user));	
	}
}