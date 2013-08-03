<?php
require_once('IdentityObject.php');

class PaperIdentityObject extends IdentityObject{
    function __construct($field=null){
        parent::__construct($field, array('id','title','content','journal_id'));
    }
}

?>