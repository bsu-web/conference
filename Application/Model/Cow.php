<?php
namespace Application\Model;

//класс Автор содержит в себе-Имя,Фамилию,Отчество.
class Cow extends \System\Orm\DomainObject{
private $name       =  "Имя коровы ";
private $color     =  "Цвет коровы ";
private $corral =  "Идентификатор стада ";

	function setName($name){ 	 //задать Имя коровы
		$this->name = $name;
                $this->markDirty();

	}
	function getName(){ 		 //получить Имя коровы
		return $this->name;
	}
	function setColor($color){ //задать цвет коровы
		$this->color = $color;
        $this->markDirty();
        
	}	
	function getColor(){        //получить цвет коровы
		return $this->color;
	}
	function setCorral($corral){	//задать стадо
		$this->corral = $corral;
                $this->markDirty();
	}	
	function getCorral(){				//получить стадо
		return $this->corral;
	}       
    
    function targetClass(){
        return 'Cow';
    }	
}
?>