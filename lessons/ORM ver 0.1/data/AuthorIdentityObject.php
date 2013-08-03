<?php
require_once('IdentityObject.php');

class AuthorIdentityObject extends IdentityObject{
    function __construct($field=null){
        parent::__construct($field, array('id','name','family','patronymic','paper_id'));
    }
}


?>