<?php
require_once('DomainObject.php');
//класс Автор содержит в себе-Имя,Фамилию,Отчество.
class Author extends DomainObject{
private $name       =  "Имя автора ";
private $family     =  "Фамилия автора ";
private $patronymic =  "Отчество автора ";

	function setName($name){ 	 //задать Имя автора
		$this->name = $name;
	}
	function getName(){ 		 //получить Имя автора
		return $this->name;
	}
	function setFamily($family){ //задать Фамилию автора
		$this->family = $family;
	}	
	function getFamily(){        //получить Фамилию автора
		return $this->family;
	}
	function setPatronymic($patronymic){	//задать Отчество автора
		$this->patronymic = $patronymic;	
	}	
	function getPatronymic(){				//получить Отчество автора
		return $this->patronymic;
	}		
/*	function __construct($name, $family, $patronymic){
	$this->name		  = $name;
	$this->family	  = $family;
	$this->patronymic = $patronymic;
	}	*/
}
?>