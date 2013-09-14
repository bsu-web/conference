<?php
namespace Application\Model;

abstract class DomainObject{ //����������� ����� ��� ����(!) ��������
    private $id= -1;
    
    function __construct($id=null){
        if (is_null($id)){
            $this->markNew();
        } else{
            $this->id= $id;
        }
    }
    
	function getId(){ //��������� id �������
		return $this->id;
	}
    
	function setId($id){ //������� id �������
		$this->id=$id;
	}
    
    function getCollection($type,$id){
        $factory= System\Orm\PersistenceFactory::getFactory($type);
        $PDOF=$factory->getDomainObjectFactory();
        return $PDOF->createCollection($id);
    }
    
    function finder(){
        $factory= System\Orm\PersistenceFactory::getFactory($this->targetClass());
        return new System\Orm\DomainObjectAssembler($factory);   
    }
    
    function markNew(){
        System\Orm\ObjectWatcher::addNew($this);
    }
    
    function markDirty(){
        System\Orm\ObjectWatcher::addDirty($this);
    }
    
    function markClean(){
        System\Orm\ObjectWatcher::addClean($this);
    }
    
    abstract function targetClass();
    
}
?>