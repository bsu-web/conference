<?php
namespace Application\Orm;

class AuthorDomainObjectFactory extends \System\Orm\DomainObjectFactory{
    function doCreateObject(array $array){
        $obj= new \Application\models\Author();
        $obj->setName($array['name']);
        $obj->setFamily($array['family']);
        $obj->setPatronymic($array['patronymic']);
        $obj->setId($array['id']);
        return $obj;
    }
    
    function targetClass(){
        return "Author";
    }
}
?>