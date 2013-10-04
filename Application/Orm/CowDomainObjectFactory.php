<?php
namespace Application\Orm;

class CowDomainObjectFactory extends \System\Orm\DomainObjectFactory{
    function doCreateObject(array $array){
        $obj= new \Application\Model\Cow();
        $obj->setName($array['name']);
        $obj->setColor($array['color']);
        $obj->setCorral($array['corral']);
        $obj->setId($array['id']);
        return $obj;
    }
    
    function targetClass(){
        return "Cow";
    }
}
?>