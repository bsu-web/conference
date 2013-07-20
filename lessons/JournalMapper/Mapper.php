<?php
require_once('ObjectWather.php');
require_once('Collection.php');

abstract class Mapper{
	protected static $pdo;
	function __construct(){
		if (!isset(self::$pdo)){
			$base='test';
			$user='root';
			$password='';
			self::$pdo=new PDO("mysql:host=localhost;dbname=".$base,$user,$password);
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			self::$pdo->prepare("set character_set_client='cp1251'")->execute();
			self::$pdo->prepare("set character_set_results='cp1251'")->execute();
			self::$pdo->prepare("set collation_connection='cp1251_general_ci'")->execute();
		}
	}
    
    
    private function getFromMap($id){
		return ObjectWatcher::exists($this->targetClass(),$id);
	}
    
    private function addToMap(DomainObject $obj){
		return ObjectWatcher::add($obj);
	}
    
    function find($id){
        $old=$this->getFromMap($id);
		if ($old){
			return $old;
		}
        $this->selectStmt()->execute(array($id));
        $array= $this->selectStmt()->fetch();
        $this->selectStmt()->closeCursor();
        if (! is_array($array)) {return null;}
        if (! isset($array['id'])) {return null;}
        $object= $this->createObject($array);
        return $object;
    }
    
     function createObject($array){
        $old=$this->getFromMap($array['id']);
		if ($old){
			return $old;
		}
        $obj= $this->doCreateObject($array);
        $this->addToMap($obj);
        return $obj;
     }
     
     function insert(DomainObject $obj){
        $this->doInsert($obj);
        $this->addToMap($obj);
     }
     
     abstract function update(DomainObject $object);
     protected abstract function doCreateObject(array $array);
     protected abstract function doInsert(DomainObject $object);
     protected abstract function selectStmt();
     abstract function targetClass();
     protected abstract function getCollection(array $raw); 
     
     
}

?>