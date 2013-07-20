<?php
require_once('Mapper.php');
require_once('Paper.php');
require_once('AuthorMapper.php');
require_once('AuthorCollection.php');

class PaperMapper extends Mapper{
    function __construct(){ //переписать запросы
        parent::__construct();
        $this->selectStmt= self::$pdo->prepare("SELECT * FROM `paper` WHERE `id`=?");
        $this->updateStmt= self::$pdo->prepare("UPDATE `paper` SET `title`=? WHERE `id`=?");
        $this->insertStmt= self::$pdo->prepare("INSERT INTO `paper` (`title`, `content`) VALUES (?,?)");
        $this->insertLinksStmt= self::$pdo->prepare("INSERT INTO `paper_authors` (`paper_id`, `author_id`) VALUES (?,?)");
        $this->findByJournalStmt= self::$pdo->prepare("SELECT * FROM `paper` INNER JOIN `journal_paper` ON `id`=`paper_id` WHERE `journal_id`=?");
    //  $this->findByPaperStmt=   self::$pdo->prepare("SELECT * FROM `author` INNER JOIN `paper_authors` ON `id`=`author_id` WHERE `paper_id`=?");
    }
    
    protected function doCreateObject(array $array){
        $obj= new Paper();
        $obj->setTitle($array['title']);
        $obj->setContent($array['content']);
        $obj->setId($array['id']);
        $author_mapper= new AuthorMapper();
        $author_collection=$author_mapper->findByPaper($obj->getId());
        $obj->setAuthors($author_collection);
        return $obj;
    }
    
    protected function doInsert(DomainObject $object){
        $values[]=$object->getTitle();
        $values[]=$object->getContent();
        $this->insertStmt->execute($values);
        $id= self::$pdo->lastInsertId();
        $object->setId($id);
        $this->InsertLinks($object->getId(),$object->getAuthors());
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
        return "Paper";
    } 
    
    protected function getCollection(array $raw){
        //return new AuthorCollection($raw,$this);
    }
    
    protected function InsertLinks($id, AuthorCollection $authors){
        foreach ($authors as $author){
            $values= array();
            $values[]=$id;
            $values[]=$author->getId();
            $this->insertLinksStmt->execute($values);
        }
    }

    function findByJournal($id){
        $this->findByJournalStmt->execute(array($id));
        return new PaperCollection($this->findByJournalStmt->fetchAll(),$this);
    }   
   
}
    
?>