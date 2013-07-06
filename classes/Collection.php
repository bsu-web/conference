<?php
abstract class Collection{
	private $set=array();
	private $title="";
	function insert (DomainObject $object){
		if (in_array($object, $this->set, true)){
			return;
		}
		$id=$object->getId();
		$this->set[$id]=$object;
	}
	function delete(DomainObject $object){
		$id=$object->getId();
		$search_array = array_key_exists($id, $this->set);
		if ($search_array){
			unset($this->set[$id]);
		}		
	}
	function getAll(){
		return $this->set;
	}
}
?>
