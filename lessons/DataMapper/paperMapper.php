<?php
require_once('Mapper.php');

class paperMapper extends Mapper{
    function __construct(PDO $pdo){
        parent::__construct($pdo);
        $this->selectStmt= self::$pdo->prepare("SELECT * FROM `paper` WHERE `id`=?");
        $this->updateStmt= self::$pdo->prepare("UPDATE `paper` SET `title`=? `content`=? WHERE `id`=?");
        $this->updateStmtAuthors= self::$pdo->prepare("UPDATE `paper_authors` SET `paper_id`=? `author_id`=? WHERE `id`=?");
        $this->insertStmt= self::$pdo->prepare("INSERT INTO `paper` (`title`, `content`) VALUES (?,?)");
        $this->insertStmtAuthors= self::$pdo->prepare("INSERT INTO `paper_authors` (`paper_id`, `author_id`) VALUES (?,?)");
    }
    
    function doCreateObject(array $array){
        $obj= new Paper;
        $obj->setTitle($array['title']);
        $obj->setContent($array['content']);
		$obj->setAuthors($array['authors']);
        $obj->setId($array['id']);
        return $obj;
    }
    
    protected function doInsert(DomainObject $object){
        $values[]=$object->getTitle();
        $values[]=$object->getContent();
        $this->insertStmt->execute($values);
		unset($values);
		$values[]=$object->getAuthors();
        $this->insertStmtAuthors->execute($values);		//проверить выполнение второй раз execute!!!
        $id= self::$pdo->lastInsertId();
        $object->setId($id);
    }
    
    function update(DomainObject $object){
        //получаем из объекта параметры указанные в updateStmt и заносим в массив vslues
        $values[]=$object->getTitle;
        $values[]=$object->getContent;
        $values[]=$object->getId();
        $this->updateStmt->execute($values);
		unset($values);
        $values[]=$object->getAuthors;		
		$values[]=$object->getId();
		$this->updateStmtAuthors->execute($values);		//проверить выполнение второй раз execute!!!
    }
    
    function selectStmt(){
        return $this->selectStmt;
    }
}

?>