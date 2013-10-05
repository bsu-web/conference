<?php
namespace Application\Command;

class editProcess extends \System\Core\Command {
	protected function exec(){
            $name=$this->req->name;
            $color=$this->req->color;
            $corral=$this->req->corral;
            $id=$this->req->id;
            $factory= \System\Orm\PersistenceFactory::getFactory('Cow');
            $finder= new \System\Orm\DomainObjectAssembler($factory);
            $idobj=$factory->getIndentityObject()->field('id')->eq($id);
            $cow=$finder->findOne($idobj);
            $cow->setName(iconv('utf-8', 'cp1251',$name));
            $cow->setColor(iconv('utf-8', 'cp1251',$color));
            $cow->setCorral(iconv('utf-8', 'cp1251',$corral));
            \System\Orm\ObjectWatcher::instance()->performOperations();
            return $this->render(
			array("name" => $name,"color" => $color,"corral" => $corral)
		);
	}
}
?>