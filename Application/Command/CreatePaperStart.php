<?php
namespace Application\Command;

class CreatePaperStart extends \System\Core\Command {
	public function exec(){

	//start (узнать сколько всего авторов ||| позже "в наборе")	
	//туплю почему не foreach
		$factory1= \System\Orm\PersistenceFactory::getFactory('Author');
		$finder1= new \System\Orm\DomainObjectAssembler($factory1);
		$insert1= new \Application\Models\Author();
		$idobj=$factory1->getIndentityObject();
		$authors= $finder1->find($idobj);
		foreach ($authors as $author){
			$array[]=array('id' => $author->getId());
		}
		$count=count($array);
	//end

		$factory= \System\Orm\PersistenceFactory::getFactory('Paper');
		$finder= new \System\Orm\DomainObjectAssembler($factory);

		$title=$_POST['title'];
		$content=$_POST['content'];
		
		$idobj=$factory->getIndentityObject()->field('title')->eq($title);
		$auth=$finder->findOne($idobj);
		
		if (!$auth) {
			$author_factory=\System\Orm\PersistenceFactory::getFactory('Author');
			$finder_aut= new \System\Orm\DomainObjectAssembler($author_factory);
			
			for ($i=1;$i<=$count;$i++){
				$uid=$_POST['author'.$i];
				if ($uid) {
					$idobj_au=$author_factory->getIndentityObject()->field('id')->eq($uid);
					$a[$i]=$finder_aut->findOne($idobj_au);
				}
			}			

			$au_col=$author_factory->getCollection();
			for ($i=1;$i<=$count;$i++){
				if ($a[$i]) {$au_col->add($a[$i]);}
			}
			
			$insert= new \Application\Models\Paper();
			$insert->setTitle($title);
			$insert->setContent($content);
			$insert->setAuthors($au_col);
			$finder->insert($insert);

			return $this->render(
				array("choice" => "1","title" => $insert->getTitle(),"content" => $insert->getContent())
			);
	
		} else {
			$msg="A paper already exists!";
			return $this->render(
				array("choice" => "0","msg" => $msg)
			);	
		}
	}
}
?>