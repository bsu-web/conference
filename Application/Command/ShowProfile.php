<?php
namespace Application\Command;

class ShowProfile extends \System\Core\Command {
	public function exec(){
	   	$id=1;
	    $factory= \System\Orm\PersistenceFactory::getFactory('Author');
	    $finder= new \System\Orm\DomainObjectAssembler($factory);
	    $idobj=$factory->getIndentityObject();
	    $idobj->field('id')->eq(1);
	    $author= $finder->findone($idobj);
	    //print_r($author);  
		return $this->render(
			array("name" => $author->getName(),"family" => $author->getFamily(),"patronymic" => $author->getPatronymic())
		);
	}
}