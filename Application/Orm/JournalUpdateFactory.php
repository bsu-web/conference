<?php
namespace Application\Orm;

class JournalUpdateFactory extends \System\Orm\UpdateFactory{
    function newUpdate(\System\Orm\DomainObject $obj){
        //???? ???????? ????
        $id= $obj->getId();
        $values['title']=$obj->getTitle();
        $values['status']=$obj->getStatus();
        $values['imprint']=$obj->getImprint();
        $values['descr']=$obj->getDescription();
        $users=$obj->getUsers();
        $str=array();
        foreach ($users as $user){
            $str[]=$user->getId().'.'.$user->getStatus();
        }
        $values['users']=implode(",",$str);
        $values['date_begin']=$obj->getDateBegin();
        $values['date_end_send']=$obj->getDateSend();
        $values['date_end_exp']=$obj->getDateExp();
        $tags=$obj->getTags();
        $str='';
        foreach ($tags as $tag){
                $str.=$tag->getId().',';
        }
        $values['tags']=$str;
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
        return $this->buildStatement('insert_paperset',$values,1);
    }
    
}

?>