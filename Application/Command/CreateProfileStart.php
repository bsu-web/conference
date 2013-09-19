<?php
namespace Application\Command;

class CreateProfileStart extends \System\Core\Command {
	public function exec(){

		$factory= \System\Orm\PersistenceFactory::getFactory('Author');
		$finder= new \System\Orm\DomainObjectAssembler($factory);
		$insert= new \Application\Models\Author();

		$family=$_POST['family'];
		$name=$_POST['name'];
		$patronymic=$_POST['patronymic'];

		$idobj=$factory->getIndentityObject()->field('name')->eq($name)->field('family')->eq($family)->field('patronymic')->eq($patronymic);
		$auth=$finder->findOne($idobj);

		If (!$auth) {
			$insert->setName($name);
			$insert->setFamily($family);
			$insert->setPatronymic($patronymic);
			$finder->insert($insert);

			return $this->render(
				array("choice" => "1","name" => $insert->getName(),"family" => $insert->getFamily(),"patronymic" => $insert->getPatronymic())
			);	
		} else {
			$msg="A user already exists!";
			return $this->render(
				array("choice" => "0","msg" => $msg)
			);	
		}
	}
}
?>