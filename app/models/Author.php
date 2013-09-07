<?php
namespace app\models;
//класс Автор содержит в себе-Имя,Фамилию,Отчество.
class Author extends \System\Orm\DomainObject{
private $name       =  "Имя автора ";
private $family     =  "Фамилия автора ";
private $patronymic =  "Отчество автора ";
public static $count=0;

	function setName($name){ 	 //задать Имя автора
		$this->name = $name;
        $this->markDirty();

	}
	function getName(){ 		 //получить Имя автора
		return $this->name;
	}
	function setFamily($family){ //задать Фамилию автора
		$this->family = $family;
        $this->markDirty();
        
	}	
	function getFamily(){        //получить Фамилию автора
		return $this->family;
	}
	function setPatronymic($patronymic){	//задать Отчество автора
		$this->patronymic = $patronymic;
        $this->markDirty();
	}	
	function getPatronymic(){				//получить Отчество автора
		return $this->patronymic;
	}
    
    function getCount(){
        return self::$count;
    }	
    
    function targetClass(){
        return 'Author';
    }	
}
?>