<?php

namespace Application\Orm;

class MessageIdentityObject extends \System\Orm\IdentityObject{
    function __construct($field=null){
        parent::__construct($field, array('id','author','text','file','datetime', 'messagegroup_id'));
    }
}


?>