<?php
abstract class Collection{ //абстрактный класс набора объектов


	//j1o1

	private $set=array();
	private $title="";
	public $cursor=-1;

	function __construct(){
		$this->cursor=-1;
	}
	
	//Iterator
	function first(){
		$this->cursor=0;
		return $this->getElement();
	}
	
	function last(){
		$this->cursor=count($this->set)-1;
		return $this->getElement();
	}
	
	function prev(){
		If($this->cursor>0){
			$this->cursor--;
		} else {
			throw new Exception('Достигнута нижняя граница массива!');
		}
		return $this->getElement();
	}
	
	function next(){
		if(($this->cursor)<(count($this->set)-1)){
			$this->cursor++;
		} else {
			throw new Exception('Достигнут верхняя граница массива');
		}
		return $this->getElement();
	}
	
	function getElement(){
		return $this->set[$this->cursor];
	}
	
	//end of Iteratot
	
	function insert(DomainObject $object){ //функция добавляения объекта в набор
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
