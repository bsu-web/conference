<?php
namespace Application\Orm;

class JournalUpdateFactory extends \System\Orm\UpdateFactory{
    function newUpdate(\app\models\DomainObject $obj){
        //ѕроверку типов желательно добавить
        $id= $obj->getId();
        $values['title']=$obj->getTitle();
        $values['status']=$obj->getStatus();
        $values['imprint']=$obj->getImprint();
        $values['descr']=$obj->getDescription();
        $users=$obj->getUsers();
        $str=array();
        foreach ($users as $user){
            $str[]=$user->getId().'.1';
        }
        $values['users']=implode(",",$str);
        if ($id >-1){
            $papers=$obj->getPapers();
            $pap='';
            foreach ($papers as $paper){
                $pap.=$paper->getId().',';
            }
            $values['papers']=$pap;
            $values['id']=$id;
            return $this->buildStatement('update_paperset',$values);
        }
        return $this->buildStatement('insert_paperset',$values);
    }
    
}

?>