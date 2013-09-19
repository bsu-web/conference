<?php
namespace Application\Command;

class AllProfile extends \System\Core\Command {
	public function exec(){

		$factory= \System\Orm\PersistenceFactory::getFactory('Author');
		$finder= new \System\Orm\DomainObjectAssembler($factory);
		$insert= new \Application\Models\Author();

		$idobj=$factory->getIndentityObject();
		$authors= $finder->find($idobj);

		foreach ($authors as $author){
			$array[]=array('id' => $author->getId(), 'family' => $author->getFamily(), 'name' => $author->getName(), 'patronymic' =>  $author->getPatronymic());
		}
		
		return $this->render(
			array("array" => $array)
		);	
	}
}
?>