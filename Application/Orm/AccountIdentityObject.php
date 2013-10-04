<?php

namespace Application\Orm;

class AccountIdentityObject extends \System\Orm\IdentityObject{
    function __construct($field=null){
        parent::__construct($field, array('id','name','family', 'userset'));
    }
}


?>