<?php
namespace Application\Orm;

class PaperDomainObjectFactory extends System\Orm\DomainObjectFactory{
    function doCreateObject(array $array){
        $obj= new app\models\Paper();
        $obj->setTitle($array['title']);
        $obj->setContent($array['content']);
        $obj->setId($array['id']);
        $author_collection=$this->createCollection($obj->getId());
        $obj->setAuthors($author_collection);
        return $obj;
    }
    
    function createCollection($id){
        $factory= PersistenceFactory::getFactory('Author');
        $finder= new DomainObjectAssembler($factory); 
        $idobj=$factory->getIndentityObject();
        $idobj->addJoin('INNER',array('author','paper_authors'),array('id','author_id'));
        $idobj->field('paper_id')->eq($id);
        return $author_collection=$finder->find($idobj);    
    }
    
    function targetClass(){
        return "Paper";
    }
}

?>