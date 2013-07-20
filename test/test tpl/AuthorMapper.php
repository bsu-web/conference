<?php
require_once('Mapper.php');
require_once('Author.php');
require_once('AuthorCollection.php');

class AuthorMapper extends Mapper{
    function __construct(){
        parent::__construct();
        $this->selectStmt= self::$pdo->prepare("SELECT * FROM `author` WHERE `id`=?");
        $this->updateStmt= self::$pdo->prepare("UPDATE `author` SET `name`=? WHERE `id`=?");
        $this->insertStmt= self::$pdo->prepare("INSERT INTO `author` (`name`, `family`,`patronymic`) VALUES (?,?,?)");
        $this->findByPaperStmt= self::$pdo->prepare("SELECT * FROM `author` INNER JOIN `paper_authors` ON `id`=`author_id` WHERE `paper_id`=?");
    }
    
    function doCreateObject(array $array){
        $obj= new Author();
        $obj->setName($array['name']);
        $obj->setFamily($array['family']);
        $obj->setPatronymic($array['patronymic']);
        $obj->setId($array['id']);
        return $obj;
    }
    
    protected function doInsert(DomainObject $object){
        $values[]=$object->getName();
        $values[]=$object->getFamily();
        $values[]=$object->getPatronymic();
        $this->insertStmt->execute($values);
        $id= self::$pdo->lastInsertId();
        $object->setId($id);
    }
    
    function update(DomainObject $object){
        $values[]=$object->getName();
        $values[]=$object->getId();
        $this->updateStmt->execute($values);
    }
    
    protected function selectStmt(){
        return $this->selectStmt;
    }
    
    function targetClass(){
        return "Author";
    }
    
    protected function getCollection(array $raw){
        return new AuthorCollection($raw,$this);
    }
    
    function findByPaper($id){
        $this->findByPaperStmt->execute(array($id));
        return new AuthorCollection($this->findByPaperStmt->fetchAll(),$this);
    }
}

?>