<?php
//require_once('IdentityObject.php'); //26-02-2014
namespace Application\Orm;

class JournalIdentityObject extends \System\Orm\IdentityObject{
    function __construct($field=null){
        parent::__construct($field, array('paperset_id','title','paper_id',
                                           'user_id', 'object_type', 'status',
                                           'status_map_id'));
    }
}

?>