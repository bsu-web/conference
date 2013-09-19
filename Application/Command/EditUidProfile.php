<?php
namespace Application\Command;

class EditUidProfile extends \System\Core\Command {
	public function exec(){

		$factory= \System\Orm\PersistenceFactory::getFactory('Author');
		$finder= new \System\Orm\DomainObjectAssembler($factory);
		$insert= new \Application\Models\Author();

		$uid=$this->data[uid];

		$idobj=$factory->getIndentityObject()->field('id')->eq($uid);
		$auth=$finder->findOne($idobj);
		
		if ($auth) {
			return $this->render(
				array("choice" => "1","name" => $auth->getName(),"family" => $auth->getFamily(),"patronymic" => $auth->getPatronymic(), "id" => $uid)
			);
		} else {
			$msg="User hasn't been created.";
			return $this->render(
				array("choice" => "0", "msg" => $msg)
			);	
		}
	}
}