<?php
abstract class Collection{
	private $set=array();
	private string $title="";
	function insert (DomainObject $object){
		$this->set[]=$object;
	}
	function delete(DomainObject $object){
		$id=$object->getId();
		//удаление из множества объекта с id
	}
}
?>
