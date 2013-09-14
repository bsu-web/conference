<?php
namespace System\Orm;

abstract class DomainObject{ //абстрактный класс для всех(!) объектов
    private $id= -1;
    
    function __construct($id=null){
        if (is_null($id)){
            $this->markNew();
        } else{
            $this->id= $id;
        }
    }
    
	function getId(){ //получение id объекта
		return $this->id;
	}
    
	function setId($id){ //задание id объекта
		$this->id=$id;
	}
    
    function getCollection($type,$id){
        $factory= PersistenceFactory::getFactory($type);
        $PDOF=$factory->getDomainObjectFactory();
        return $PDOF->createCollection($id);
    }
    
    function finder(){
        $factory= PersistenceFactory::getFactory($this->targetClass());
        return new DomainObjectAssembler($factory);   
    }
    
    function markNew(){
        ObjectWatcher::addNew($this);
    }
    
    function markDirty(){
        ObjectWatcher::addDirty($this);
    }
    
    function markClean(){
        ObjectWatcher::addClean($this);
    }
    
    abstract function targetClass();
    
}
?>