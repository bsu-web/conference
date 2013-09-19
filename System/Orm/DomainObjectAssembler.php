<?php
namespace System\Orm;

class DomainObjectAssembler{
    protected static $pdo;
    protected $factory;
    private $statements= array();
    
    function __construct(PersistenceFactory $factory){
        $this->factory= $factory;
        if (!isset(self::$pdo)){
			// $base='test';
			// $user='root';
			// $password='';
			self::$pdo=\System\Core\DbConn::getPDO();
            // new \PDO("mysql:host=localhost;dbname=".$base,$user,$password);
			// self::$pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
			self::$pdo->prepare("set character_set_client='cp1251'")->execute();
			self::$pdo->prepare("set character_set_results='cp1251'")->execute();
			self::$pdo->prepare("set collation_connection='cp1251_general_ci'")->execute();
		}        
    }
    
    private function getStatement($str){
        if (! isset($this->statements[$str])){
            $this->statements[$str]=self::$pdo->prepare($str);
        }
        return $this->statements[$str];
    }
    
    function findOne(IdentityObject $idobj){
        $collection= $this->find($idobj);
        return $collection->next();
    }
    
    function find(IdentityObject $idobj){
        $selfact= $this->factory->getSelectionFactory();
        list($selection, $values)= $selfact->newSelection($idobj,$this->factory->getType());
        $stmt= $this->getStatement($selection);
        //$stmt->execute($values);
        //$raw=$stmt->fetchAll();
        return $this->factory->getDefferedCollection($stmt,$values);
    }
    
    function insert(DomainObject $obj){
        $upfact=$this->factory->getUpdateFactory();
        list($update, $values,$link)= $upfact->newUpdate($obj);
        $stmt= $this->getStatement($update);
        $stmt->execute($values);
        if ($obj->getId()<0){
            $obj->setId(self::$pdo->lastInsertId());
        }
        if ($link){
            list($insert,$values)=$upfact->InsertLink($obj); 
            $stmt= $this->getStatement($insert);
            foreach ($values as $value){
                $stmt->execute($value);   
            } 
        }
        $obj->markClean();
    }
    
}
?>