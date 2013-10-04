<?php
namespace Application\Orm;

class CowCollection extends \System\Orm\Collection{    
    function targetClass(){
        return "Cow";
    }
}

?>