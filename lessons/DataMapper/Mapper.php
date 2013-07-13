<?php
require_once('Author.php');
require_once('DomainObject.php');

abstract class Mapper{
	protected static $DBH;
	function __construct(){
		if (!isset(self::$DBH)){
			$base='test';
			$user='root';
			$password='';
			self::$DBH=new PDO("mysql:host=localhost;dbname=".$base,$user,$password);
			self::$DBH->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			self::$DBH->prepare("set character_set_client='cp1251'")->execute();
			self::$DBH->prepare("set character_set_results='cp1251'")->execute();
			self::$DBH->prepare("set collation_connection='cp1251_general_ci'")->execute();
		}
	} 
    
    function find($id){
        $this->selectStmt()->execute(array($id));
        $array= $this->selectStmt()->fetch();
        $this->selectStmt()->closeCursor();
        if (! is_array($array)) {return null;}
        if (! isset($array['id'])) {return null;}
        $object= $this->createObject($array);
        return $object;
    }
    
     function createObject(array $array){
        $obj= $this->doCreateObject($array);
        return $obj;
     }
     
     function insert(DomainObject $obj){
        $this->doInsert($obj);
     }
     
     abstract function update(DomainObject $object);
     protected abstract function doCreateObject(array $array);
     protected abstract function doInsert(DomainObject $object);
     protected abstract function selectStmt();
     
     
}

?>