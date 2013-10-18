<?php

namespace Application\Orm;

class MessageGroupDomainObjectFactory extends \System\Orm\DomainObjectFactory{
    function doCreateObject(array $array){
        $obj= new \Application\Model\MessageGroup();
        $author = $this->createAuthor($array['message_group_author']);
        $obj->setAuthor($author);
        
        $obj->setTitle($array['message_group_title']);
        $obj->setId($array['message_group_id']);
        $obj->setDescription($array['message_group_description']);
        $partners = $this->createAccountCollection($array['message_group_partners']);
        $obj->setPartners($partners);
        
        $messages_collection=$this->createMessagesCollection($obj->getId());
        $obj->setMessages($messages_collection);
        return $obj;
    }
    
    public function createAuthor($id_author){
    	$factory= \System\Orm\PersistenceFactory::getFactory('Account');
    	$finder= new \System\Orm\DomainObjectAssembler($factory);
    	$idobj=$factory->getIndentityObject()->field('id')->eq($id_author);
    	return $account= $finder->findOne($idobj);
    }
    function createAccountCollection($id){
    	$factory = \System\Orm\PersistenceFactory::getFactory('Account');
    	$finder = new \System\Orm\DomainObjectAssembler($factory);
    	$idobj = $factory->getIndentityObject();
    	$idobj->addJoin('INNER',array('account','userset'),array('id','user'));
    	$idobj->field('userset')->eq($id);
    	$account_Collection = $finder->find($idobj);
    	return $account_Collection;
    }
    function createMessagesCollection($id){
        $factory = \System\Orm\PersistenceFactory::getFactory('Message');
        $finder = new \System\Orm\DomainObjectAssembler($factory); 
        $idobj = $factory->getIndentityObject();
        $idobj->addJoin('INNER',array('message','messagegroup_message'),array('id','message_id'));
        $idobj->field('messagegroup_id')->eq($id);
        $messages_collection = $finder->find($idobj);
        return $messages_collection;
    }
    
    function targetClass(){
        return "MessageGroup";
    }
}

?>