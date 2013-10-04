<?php

namespace Application\Orm;

class AccountUpdateFactory extends \System\Orm\UpdateFactory{
    function newUpdate(\System\Orm\DomainObject $obj){
        $id= $obj->getId();
        $cond=null;
        $values['name']=$obj->getName();
        $values['family']=$obj->getFamily();
        if ($id >-1){
            $cond['id']=$id;
        }
        return $this->buildStatement('account',$values,$cond);
    }
}
?>