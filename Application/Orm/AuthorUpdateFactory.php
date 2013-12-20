<?php
namespace Application\Orm;

class AuthorUpdateFactory extends \System\Orm\UpdateFactory{
    function newUpdate(\app\models\DomainObject $obj){
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