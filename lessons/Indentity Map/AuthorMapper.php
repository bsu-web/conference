<?php
require_once('Mapper.php');

class AuthorMapper extends Mapper{
    function __construct(PDO $pdo){
        parent::__construct($pdo);
        $this->selectStmt= self::$pdo->prepare("SELECT * FROM `author` WHERE `id`=?");
        $this->updateStmt= self::$pdo->prepare("UPDATE `author` SET `name`=? WHERE `id`=?");
        $this->insertStmt= self::$pdo->prepare("INSERT INTO `author` (`name`, `family`,`patronymic`) VALUES (?,?,?)");
    }
    
    function doCreateObject(array $array){
        $obj= new Author;
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
    
    function selectStmt(){
        return $this->selectStmt;
    }
    
    function targetClass(){
        return "Author";
    }
}

?>