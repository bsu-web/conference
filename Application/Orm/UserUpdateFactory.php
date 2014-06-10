<?php
namespace Application\Orm;
use System\Orm\DomainObject;

class UserUpdateFactory extends \System\Orm\UpdateFactory{
    function newUpdate(DomainObject $obj){
        $id= $obj->getId();
        $values['name']=$obj->getName();
        $values['family']=$obj->getFamily();
        $values['patronymic']= $obj->getPatronymic();
        $values['birthday']=$obj->getBirthday();
        $values['resid']=$obj->getResidence();
        $values['gender']=$obj->getGender();
        $values['edu']=$obj->getEducation();
        $tags=$obj->getTags();
        $str='';
        foreach ($tags as $tag){
            $str.=$tag['tag_id'].',';
        }
        $values['tags']=$str;
        $values['work']=$obj->getTelephone();
        $values['post']=$obj->getPost();
        $values['email']=$obj->getMail();
        $values['degree']=$obj->getDegree();
        $values['additionally']=$obj->getAdditionally();
        if ($id >-1){
            $values['id']=$obj->getId();
            return $this->buildStatement('update_user',$values);
        }
        return $this->buildStatement('insert_user',$values,1);
    }
}
?>