<?php
namespace Application\Command;

//02/05/2014
class ShowProfile extends \System\Core\Command {
	public function exec(){
		$factory= \System\Orm\PersistenceFactory::getFactory('User');
		$finder= new \System\Orm\DomainObjectAssembler($factory);
		$insert= new \Application\Model\User();

		$uid=$this->data["uid"];
		$idobj=$factory->getIndentityObject()->field('user_id')->eq($uid);
		$user=$finder->findOne($idobj,'user');
        
        $factory2= \System\Orm\PersistenceFactory::getFactory('Journal');
		$finder2= new \System\Orm\DomainObjectAssembler($factory2);
        
        $factory1= \System\Orm\PersistenceFactory::getFactory('Paper');
		$finder1= new \System\Orm\DomainObjectAssembler($factory1);
		$idobj1=$factory1->getIndentityObject();
        $idobj1->addJoin('INNER',array('paper','paper_authors'),array('paper_id','paper_id'));
        $idobj1->field('author_id')->eq($user->getId())->field('status_map_id')->eq(6);
        $papers=$finder1->find($idobj1,'paper');
        $journals=array();
        foreach($papers as $paper){
            $idobj2=$factory2->getIndentityObject();
            $idobj2->addJoin('INNER',array('paperset','paper_paperset'),array('paperset_id','paperset_id'));
            $idobj2->field('paper_id')->eq($paper->getId());
            $journal=$finder2->findOne($idobj2,'paperset');
            $journals[]=$journal->getId();
        }       
        

		if ($user) {
			return $this->render(
				array("choice" => "1", "user" => $user, "papers" => $papers, "journals" => $journals)
			);
		} else {
			$msg="User not exists.";
			return $this->render(
				array("choice" => "0", "msg" => $msg)
			);	
		}
	}
}
?>