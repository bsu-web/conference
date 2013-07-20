<?php
require_once('DomainObject.php');
//класс Автор содержит в себе-Имя,Фамилию,Отчество.
class Author extends DomainObject{
private $name       =  "Имя автора ";
private $family     =  "Фамилия автора ";
private $patronymic =  "Отчество автора ";
public static $count=0;

   /* function __construct(){
        self::$count++;
        echo 'Sozdan object Author'.self::$count.' raz </br>';
    }    */

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
    
    function getCount(){
        return self::$count;
    }		
}
?>