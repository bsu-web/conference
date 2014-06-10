<?php
namespace Application\Orm;

class PaperUpdateFactory extends \System\Orm\UpdateFactory{
    function newUpdate(\System\Orm\DomainObject $obj){
        //ѕроверку типов желательно добавить
        $id= $obj->getId();
        $values['url']=$obj->getUrl();
        $values['title']=$obj->getTitle();
        $values['abstract']=$obj->getAbstract();
        $values['bibl']=$obj->getBibliography();
        $values['status']=$obj->getStatus();
        $values['descr']=$obj->getDescription();
        $authors=$obj->getUsers();
        $users=array();
        foreach ($authors as $author){
            $users[]=$author->getId().'.1';
        }
        $values['users']=implode(",",$users);
        $tags=$obj->getTags();
        $str='';
        foreach ($tags as $tag){
            $str.=$tag->getId().',';
        }
        $values['tags']=$str;
        $values['pos_begin']=$obj->getPosBegin();
        $values['pos_end']=$obj->getPosEnd();
        $values['tag_id']=$obj->getTagId();
        if ($id >-1){
            $values['id']=$obj->getId();
            return $this->buildStatement('update_paper',$values);
        }
        $values['id_author']=$obj->getAuthorId();
        return $this->buildStatement('insert_paper',$values,1);
    }
}

?>