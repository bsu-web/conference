<?php

namespace System\Auth;

/**
 *
 * @author user
 *        
 */
class Group {
	private $allow = array();
	private $deny = array();
	private $parent;
	private $name;
	
	public function __construct($parent){
		$this->parent = $parent;
	}
	
	public function getParent(){
		return $this->parent;
	}
	
	public function setParent($parent){ 
		$this->parent = $parent;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($name){
		$this->name = $name;
	}
	
	public function Allow($cmd){
		if(!in_array($cmd, $this->allow)){
			$this->allow[] = $cmd;
		}
		
		if(in_array($cmd, $this->deny)){
			$new_deny = array();
			foreach ($this->deny as $arr){
				if ($arr != $cmd) {
					$new_deny[] = $cmd;
				}
			}
			$this->deny = $new_deny;
		}
	}
	
	public function Deny($cmd){
		if(!in_array($cmd, $this->deny)){
			$this->deny[] = $cmd;
		}
		
		if(in_array($cmd, $this->allow)){
			$new_allow = array();
			foreach ($this->allow as $arr){
				if ($arr != $cmd) {
					$new_allow[] = $cmd;
				}
			}
			$this->allow = $new_allow;
		}
	}
	
	public function isAllowed($cmd){
		if (in_array($cmd, $this->allow)) {
			return true;
		}
		return false;
	}
	
	public function isDenied($cmd){
		if (in_array($cmd, $this->deny)) {
			return true;
		}
		return false;
	}
	
	
	
}

?>