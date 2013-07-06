<?php
abstract class DomainObject{
	private $id;
	
	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id=$id;
	}
}
?>