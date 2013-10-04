<?php

namespace Application\Orm;

class MessageUpdateFactory extends \System\Orm\UpdateFactory{
    function newUpdate(\System\Orm\DomainObject $obj){
        $id= $obj->getId();
        $cond=null;
        $author = $obj->getAuthor();
        $factory= \System\Orm\PersistenceFactory::getFactory('Account');
        $finder= new D\System\Orm\omainObjectAssembler($factory);
        $finder->insert($author);        
        $values['author']=$author->getId();
        $values['text']=$obj->getText();
        $values['file']= $obj->getFile();
		$values['datetime']= $obj->getDate();
        if ($id >-1){
            $cond['id']=$id;
        }
        return $this->buildStatement('Message',$values,$cond);
    }
}

?>