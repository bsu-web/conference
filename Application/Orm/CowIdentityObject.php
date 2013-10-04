<?php
namespace Application\Orm;

class CowIdentityObject extends \System\Orm\IdentityObject{
    function __construct($field=null){
        parent::__construct($field, array('id','name','color','corral'));
    }
}


?>