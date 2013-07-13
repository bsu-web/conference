<?php
//require_once();

abstract class Mapper{
    protected static $pdo;
    
    function __construct(PDO $pdo){
        self::$pdo=$pdo;
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
    
     function createObject($array){
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