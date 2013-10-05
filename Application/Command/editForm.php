<?php
namespace Application\Command;

class editForm extends \System\Core\Command {
	protected function exec(){
            $id=$this->data['cowid'];
            $factory= \System\Orm\PersistenceFactory::getFactory('Cow');
            $finder= new \System\Orm\DomainObjectAssembler($factory);
            $idobj=$factory->getIndentityObject()->field('id')->eq($id);
            $cow=$finder->findOne($idobj);
            return $this->render(
			array("name" => $cow->getName(),"color" => $cow->getColor(),"corral" => $cow->getCorral(),"id"=>$id)
		);
	}
}
?>