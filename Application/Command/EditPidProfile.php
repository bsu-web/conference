<?php
namespace Application\Command;

class EditPidProfile extends \System\Core\Command {
	public function exec(){

		$factory= \System\Orm\PersistenceFactory::getFactory('Paper');
		$finder= new \System\Orm\DomainObjectAssembler($factory);
		$insert= new \Application\Models\Paper();
		
		$pid=$this->data[pid];

		$idobj=$factory->getIndentityObject()->field('id')->eq($pid);
		$auth=$finder->findOne($idobj);
				
		if ($auth) {
			
		
			return $this->render(
				array("choice" => "1","title" => $auth->getTitle(),"content" => $auth->getContent(), "id" => $pid)
			);
		} else {
			$msg="Paper hasn't been created.";
			return $this->render(
				array("choice" => "0", "msg" => $msg)
			);	
		}
	}
}