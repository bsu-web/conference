<?php
require_once('ObjectWather.php');
abstract class DomainObject{ //абстрактный класс для всех(!) объектов
    private $id;
    
	function getId(){ //получение id объекта
		return $this->id;
	}
    
	function setId($id){ //задание id объекта
		$this->id=$id;
	}
}
?>