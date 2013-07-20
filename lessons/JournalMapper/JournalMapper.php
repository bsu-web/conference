<?php
require_once('Mapper.php');
require_once('Journal.php');
require_once('PaperMapper.php');
require_once('PaperCollection.php');

class JournalMapper extends Mapper{
    function __construct(){ //переписать запросы
        parent::__construct();
        $this->selectStmt= self::$pdo->prepare("SELECT * FROM `journal` WHERE `id`=?");
        $this->updateStmt= self::$pdo->prepare("UPDATE `journal` SET `title`=? WHERE `id`=?");
        $this->insertStmt= self::$pdo->prepare("INSERT INTO `journal` (`title`) VALUES (?)");
        $this->insertLinksStmt= self::$pdo->prepare("INSERT INTO `journal_paper` (`journal_id`, `paper_id`) VALUES (?,?)");
        $this->findByJournalStmt= self::$pdo->prepare("");
    }
    
    protected function doCreateObject(array $array){
        $obj= new Journal();
        $obj->setTitle($array['title']);
     //   $obj->setContent($array['content']);
        $obj->setId($array['id']);
        $paper_mapper= new PaperMapper();
        $paper_collection=$paper_mapper->findByJournal($obj->getId());
        $obj->setPapers($paper_collection);
        return $obj;
    }
    
    protected function doInsert(DomainObject $object){
        $values[]=$object->getTitle();
   //     $values[]=$object->getContent();
        $this->insertStmt->execute($values);
        $id= self::$pdo->lastInsertId();
        $object->setId($id);
        $this->InsertLinks($object->getId(),$object->getPapers());
    }
    
    function update(DomainObject $object){
        $values[]=$object->getTitle();
        $values[]=$object->getId();
        $this->updateStmt->execute($values);
    }
    
   protected function selectStmt(){
        return $this->selectStmt;
    }
    
    function targetClass(){
        return "Journal";
    } 
    
    protected function getCollection(array $raw){
        //return new PaperCollection($raw,$this);
    }
    
    protected function InsertLinks($id, PaperCollection $papers){
        foreach ($papers as $paper){
            $values= array();
            $values[]=$id;
            $values[]=$paper->getId();
            $this->insertLinksStmt->execute($values);
        }
    }
    
   
}
    
?>