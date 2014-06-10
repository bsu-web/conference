<?php
namespace Application\Orm;

class AuthorCollection extends \System\Orm\Collection{    
    function targetClass(){
        return "Author";
    }
}
?>