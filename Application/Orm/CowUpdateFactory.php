<?php
namespace Application\Orm;

class CowUpdateFactory extends \System\Orm\UpdateFactory{
    function newUpdate(\System\Orm\DomainObject $obj){        
        $id= $obj->getId();
        $cond=null;
        $values['name']=$obj->getName();
        $values['color']=$obj->getColor();
        $values['corral']= $obj->getCorral();
        if ($id >-1){
            $cond['id']=$id;
        }
        return $this->buildStatement('cow',$values,$cond);
    }
}

?>