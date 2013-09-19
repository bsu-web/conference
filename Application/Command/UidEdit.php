<?php
namespace Application\Command;

class UidEdit extends \System\Core\Command {
	public function exec(){

		$factory= \System\Orm\PersistenceFactory::getFactory('Author');
		$finder= new \System\Orm\DomainObjectAssembler($factory);
		$insert= new \Application\Models\Author();

		$family=$_POST['family'];
		$name=$_POST['name'];
		$patronymic=$_POST['patronymic'];
		$id=$_POST['id'];
		
		$idobj=$factory->getIndentityObject()->field('name')->eq($name)->field('family')->eq($family)->field('patronymic')->eq($patronymic);
		$auth=$finder->findOne($idobj);
		
		if (!$auth) {
			$idobj=$factory->getIndentityObject()->field('id')->eq($id);
			$auth=$finder->findOne($idobj);
	
			$auth->setFamily($family);
			$auth->setName($name);
			$auth->setPatronymic($patronymic);
			$finder->insert($auth);
			
			return $this->render(
				array("choice" => 1, "name" => $auth->getName(),"family" => $auth->getFamily(),"patronymic" => $auth->getPatronymic())
			);	
		} else {
			return $this->render(
				array("choice" => 0, "name" => $auth->getName(),"family" => $auth->getFamily(),"patronymic" => $auth->getPatronymic())
			);
		}
		
	}
}
?>