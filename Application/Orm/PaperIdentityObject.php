<?php
namespace Application\Orm;

class PaperIdentityObject extends \System\Orm\IdentityObject{
    function __construct($field=null){
        parent::__construct($field, array('paper_id','paper_title','content','paperset_id','paper_authors.author_id','status_map_id', 'author_id'));
    }
}

?>