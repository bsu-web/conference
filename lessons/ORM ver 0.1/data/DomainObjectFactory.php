<?php
require_once('ObjectWather.php');

 abstract class DomainObjectFactory{
    function createObject(array $array){
        $old=$this->getFromMap($array['id']);
		if ($old){
		  echo '”же есть! </br>';
			return $old;
		}
        $obj= $this->doCreateObject($array);
        $this->addToMap($obj);
        $obj->markClean();
        return $obj;  
    }
    
    private function getFromMap($id){
		return ObjectWatcher::exists($this->targetClass(),$id);
	}
    
    private function addToMap(DomainObject $obj){
		return ObjectWatcher::add($obj);
	}
    
    abstract function doCreateObject(array $array);
    abstract function targetClass();
 } 
?>