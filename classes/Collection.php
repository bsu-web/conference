<?php
abstract class Collection{
	public $set=array();
	private $title="";
	function insert ($object){
		if (in_array($object, $this->set, true)){
			return;
		}
		$id=$object->getId();
		$this->set[$id]=$object;
	}
	function delete($object){
		$id=$object->getId();
		$search_array = array_key_exists($id, $this->set);
		if ($search_array){
			unset($this->set[$id]);
		}		
	}
}
?>
