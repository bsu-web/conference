<?php
namespace Application\Command;

use Auth\Login;

class MessageSystemGroupsShow extends \System\Core\Command{
	public function exec(){
		$session = new \System\Session\Session();
		$user_id = $session->get('user_id');

 		$factory = \System\Orm\PersistenceFactory::getFactory('Account');
 		$finder = new \System\Orm\DomainObjectAssembler($factory);
 		$idobj = $factory->getIndentityObject();
 		$idobj->field('id')->eq($user_id);
 		$user = $finder->findOne($idobj);

 		
 		$factory = \System\Orm\PersistenceFactory::getFactory('MessageGroup');
 		$finder = new \System\Orm\DomainObjectAssembler($factory);
 		$idobj = $factory->getIndentityObject();
 		$idobj->addWhat(array('message_group_id', 'message_group_title', 'message_group_description', 'message_group_author', 'message_group_partners'));
 		$idobj->addJoin('INNER',array('messagegroup','userset'),array('message_group_partners','userset'));
 		$idobj->field('user')->eq($user_id);
 		$listgroup = $finder->find($idobj);

 		return $this->render(array("listgroup" => $listgroup, "user" => $user));
	}
}