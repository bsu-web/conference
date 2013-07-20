<?php
require_once('ObjectWather.php');
require_once('HelperFactory.php');
abstract class DomainObject{ //абстрактный класс для всех(!) объектов
    private $id;
    
	function getId(){ //получение id объекта
		return $this->id;
	}
    
	function setId($id){ //задание id объекта
		$this->id=$id;
	}
    
    static function getCollection($type){
        return HelperFactory::getCollection($type);
    }
    
    function collection(){
        return self::getCollection(get_class($this));
    }
}
?>