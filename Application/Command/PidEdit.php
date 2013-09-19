<?php
namespace Application\Command;

class PidEdit extends \System\Core\Command {
	public function exec(){

		$factory= \System\Orm\PersistenceFactory::getFactory('Paper');
		$finder= new \System\Orm\DomainObjectAssembler($factory);
		$insert= new \Application\Models\Paper();

		$title=$_POST['title'];
		$content=$_POST['content'];
		$id=$_POST['id'];

		$idobj=$factory->getIndentityObject()->field('title')->eq($title);
		$auth=$finder->findOne($idobj);
		print_r($auth);
		
		if (!$auth) {
			$idobj=$factory->getIndentityObject()->field('id')->eq($id);
			$auth=$finder->findOne($idobj);
	
			$auth->setTitle($title);
			$auth->setContent($content);
			$finder->insert($auth);
			
			return $this->render(
				array("choice" => 1, "title" => $auth->getTitle(),"content" => $auth->getContent())
			);	
		} else {
			return $this->render(
				array("choice" => 0, "title" => $auth->getTitle(),"content" => $auth->getContent())
			);
		}
	}
}
?>