<?php

namespace Application\Orm;

class AccountDomainObjectFactory extends \System\Orm\DomainObjectFactory{
    function doCreateObject(array $array){
        $obj= new \Application\Model\Account();
        $obj->setId($array['id']);
        $obj->setName($array['name']);
        $obj->setFamily($array['family']);        
        return $obj;
    }
    
    function targetClass(){
        return "Account";
    }
}
?>