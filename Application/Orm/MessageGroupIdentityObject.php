<?php

namespace Application\Orm;

class MessageGroupIdentityObject extends \System\Orm\IdentityObject{
    function __construct($field=null){
        parent::__construct($field, array('message_group_id','message_group_title', 'message_group_description', 'message_group_author', 'message_group_partners', 'userset', 'messagegroup_id', 'user'));
    }
}

?>