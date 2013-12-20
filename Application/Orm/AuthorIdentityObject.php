<?php
namespace Application\Orm;

class AuthorIdentityObject extends \System\Orm\IdentityObject{
    function __construct($field=null){
        parent::__construct($field, array('id','name','family','patronymic','paper_id'));
    }
}


?>