<?php

namespace Application\Orm;

class MessageGroupUpdateFactory extends \System\Orm\UpdateFactory{
    function newUpdate(\System\Orm\DomainObject $obj){
        $id= $obj->getId();
        $cond=null;
        $values['title']=$obj->getTitle();
        $values['description']=$obj->getDescription();
        $values['author']=$obj->getAuthor()->getId();
        if ($id >-1){
            $cond['id']=$id;
            return $this->buildStatement('messagegroup',$values,$cond);
        }
        return $this->buildStatement('messagegroup',$values,$cond,true);
    }
    
    function InsertLink(\System\Orm\DomainObject $obj){
        $messages=$obj->getMessages();
        $links= array('messagegroup_id','message_id');
        $query=$this->buildLinks('messagegroup_message',$links);
        foreach ($messages as $message){
            $values[]=array($obj->getId(),$message->getId());
        }  
        return array($query,$values);
    }
}

?>