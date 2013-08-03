<?php
require_once('DomainObjectFactory.php');
require_once('../Author.php');

class AuthorDomainObjectFactory extends DomainObjectFactory{
    function doCreateObject(array $array){
        $obj= new Author();
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