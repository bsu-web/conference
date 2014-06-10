<?php
namespace Application\Orm;

class PaperDomainObjectFactory extends \System\Orm\DomainObjectFactory{
    function doCreateObject(array $array){
        $obj= new \Application\Model\Paper();
        $obj->setTitle($array['paper_title']);
        $obj->setAbstract($array['paper_abstract']);
        $obj->setId($array['paper_id']);
        $obj->setUrl($array['paper_uploaded_file_url']);
        $obj->setBibliography($array['paper_bibliography']);
        $obj->setDescription($array['paper_description']);
        $obj->setStatus($array['status_map_id']);
        $obj->setPosBegin($array['paper_position_begin']);
        $obj->setPosEnd($array['paper_position_end']);
        $obj->setTagId($array['tag_id']);
        $obj->setAuthorId($array['author_id']);
        $obj->setMessageSetId($array['messageset_id']);
        $user_collection=$this->createCollection('user','user','paper_authors','user_id','author_id','paper_id',$obj->getId());
        $obj->setUsers($user_collection);
        $tag_collection=$this->createCollection('tag','tag','paper_tag','tag_id','tag_id','paper_id',$obj->getId());
        $obj->setTags($tag_collection);
        return $obj;
    }
    
    
    function targetClass(){
        return "Paper";
    }
}

?>