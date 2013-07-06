<?php
require_once('Collection.php');
class Authors extends Collection{ //класс "набор авторов"
	function getString(){ //функция возвращает набо авторов для конкретной статьи/презентации/тезиса etc.
		$array=$this->getAll(); //получение массив объектов  из родительского класса
		$s="";
		foreach ($array as $vArray){
			$help=$vArray->getName();
			$s.=" ".$help;
			$help=$vArray->getFamily();
			$s.=" ".$help;
			$help=$vArray->getPatronymic();
			$s.=" ".$help;
			$s.=", ";
		}
		return $s;
	}
}
?>
