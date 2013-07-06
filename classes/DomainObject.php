<?php
abstract class DomainObject{
	private $id;
	
	function getId(){
		return $this->id;
	}
	function setId(int $id){
		$this->id=$id;
	}
}
?>