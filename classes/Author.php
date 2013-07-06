<?php
require_once('DomainObject.php');
class Author extends DomainObject{
private $name       =  "Имя автора ";
private $family     =  "Фамилия автора ";
private $patronymic =  "Отчество автора ";

	function setName($name){
		$this->name = $name;
	}
	function getName(){
		return $this->name;
	}
	function setFamily($family){
		$this->family = $family;
	}	
	function getFamily(){
		return $this->family;
	}
	function setPatronymic($patronymic){
		$this->patronymic = $patronymic;
	}	
	function getPatronymic(){
		return $this->patronymic;
	}		
/*	function __construct($name, $family, $patronymic){
	$this->name		  = $name;
	$this->family	  = $family;
	$this->patronymic = $patronymic;
	}	*/
}
?>