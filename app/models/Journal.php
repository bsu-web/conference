<?php
require_once('Collection.php');
class Journal extends Collection{ //класс "журнал документов"
	function getString(){ //функция возвращает строку, в которой хранится набор статей/презентаций/тезисов
		$array=$this->getAll(); //получение массив объектов  из родительского класса
		$s="";
		foreach ($array as $vArray){ //+
			$help=$vArray->getTitle();
			$s.=" ".$help;				
			$help=$vArray->getAuthors()->getString();
			$s.=" ".$help;
			$s.="<br>";
		}
		return $s;
	}
}
?>
