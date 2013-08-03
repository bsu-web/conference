<?php
require_once('UpdateFactory.php');

class AuthorUpdateFactory extends UpdateFactory{
    function newUpdate(DomainObject $obj){
        //ѕроверку типов желательно добавить
        $id= $obj->getId();
        $cond=null;
        $values['name']=$obj->getName();
        $values['family']=$obj->getFamily();
        $values['patronymic']= $obj->getPatronymic();
        if ($id >-1){
            $cond['id']=$id;
        }
        return $this->buildStatement('author',$values,$cond);
    }
}

?>