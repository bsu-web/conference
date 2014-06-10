<?php
namespace Application\Orm;

class JournalDomainObjectFactory extends \System\Orm\DomainObjectFactory{
    function doCreateObject(array $array){
        $obj= new \Application\Model\Journal();
        $obj->setTitle($array['paperset_title']);
        $obj->setId($array['paperset_id']);
        $obj->setImprint($array['paperset_imprint']);
        $obj->setDescription($array['paperset_description']);
        $obj->setStatus($array['status_map_id']);
        $obj->setDateBegin($array['paperset_date_begin']);
        $obj->setDateSend($array['paperset_send_end']);
        $obj->setDateExp($array['paperset_exp_end']);
        
        $factory= \System\Orm\PersistenceFactory::getFactory('User');
        $finder= new \System\Orm\DomainObjectAssembler($factory); 
        $idobj=$factory->getIndentityObject();
        $idobj->field('paperset_id')->eq($obj->getId());
        $user_collection=$finder->find($idobj,'paperset_users');
        $obj->setUsers($user_collection);       
        $paper_collection=$this->createCollection('paper','paper','paper_paperset','paper_id','paper_id','paperset_id',$obj->getId());
        $obj->setPapers($paper_collection);
        $tag_collection=$this->createCollection('tag','tag','journal_tag','tag_id','tag_id','journal_id',$obj->getId());
        $obj->setTags($tag_collection);
        return $obj;
    }
        
    function targetClass(){
        return "Jounal";
    }
}


?>