<?php
abstract class Collection{ //абстрактный класс набора объектов
	private $set=array();
	private $title="";
	function insert (DomainObject $object){ //функция добавляения объекта в набор
		if (in_array($object, $this->set, true)){
			return;
		}
		$id=$object->getId();
		$this->set[$id]=$object;
	}
	function delete(DomainObject $object){ //функция удаления элемента из набора
		$id=$object->getId();
		$search_array = array_key_exists($id, $this->set);
		if ($search_array){
			unset($this->set[$id]);
		}		
	}
	function getAll(){ //функция выдает массив всех объектов класса
		return $this->set;
	}
}
?>
