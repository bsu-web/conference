<?php

namespace Application\Orm;

class MessageDomainObjectFactory extends \System\Orm\DomainObjectFactory{
    public function doCreateObject(array $array){
        $obj= new \Application\Model\Message();
        $obj->setId($array['id']);        
        $obj->setText($array['text']);
        $obj->setFile($array['file']);
		$obj->setDate($array['datetime']);
		$author = $this->createAuthor($array['author']);
		$obj->setAuthor($author);
        return $obj;
    }
    
    public function createAuthor($id_author){
    	$factory = \System\Orm\PersistenceFactory::getFactory('Account');
    	$finder = new \System\Orm\DomainObjectAssembler($factory);
    	$idobj = $factory->getIndentityObject()->field('id')->eq($id_author);
    	return $account = $finder->findOne($idobj);
    }
    
    public  function targetClass(){
        return "Message";
    }
}
?>