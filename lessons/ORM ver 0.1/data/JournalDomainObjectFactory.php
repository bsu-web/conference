<?php
require_once('DomainObjectFactory.php');
require_once('../Journal.php');

class JournalDomainObjectFactory extends DomainObjectFactory{
    function doCreateObject(array $array){
        $obj= new Journal();
        $obj->setTitle($array['title']);
        $obj->setId($array['id']);
        $paper_collection=$this->createCollection($obj->getId());
        $obj->setPapers($paper_collection);
        return $obj;
    }
    
    function createCollection($id){
        $factory= PersistenceFactory::getFactory('Paper');
        $finder= new DomainObjectAssembler($factory); 
        $idobj=$factory->getIndentityObject();
        $idobj->addJoin('INNER',array('paper','journal_paper'),array('id','paper_id'));
        $idobj->field('journal_id')->eq($id);
        return $author_collection=$finder->find($idobj);    
    }
    
    function targetClass(){
        return "Jounal";
    }
}


?>