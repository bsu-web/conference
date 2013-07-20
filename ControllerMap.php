<?php

/** 
 * @author user
 * 
 */
class ControllerMap {
	private $viewMap = array();
	private $forwardMap = array();
	private $classrootMap = array();
	
	public function addClassroot($command, $classroot){
		$this->classrootMap[$command] = $classroot;
	}
	
	public function getClassroot($command){
		if (isset($this->classrootMap[$command])) {
			return $this->classrootMap[$command];
		}
		return $command;
	}
	
	public function addView($command='default', $status=0, $view){
		$this->viewMap[$command][$status] = $view;
	}
	
	public function getView($command, $status){
		if (isset($this->viewMap[$command][$status])) {
			return $this->viewMap[$command][$status];
		}
		return null;
	}
	
	public function addForward($command, $status=0, $newCommand){
		$this->forwardMap[$command][$status] = $newCommand;
	}
	
	public function getForward($command, $status){
		if(isset($this->forwardMap[$command][$status])){
			return $this->forwardMap[$command][$status];
		}
		return null;
	}
	
	
	
	
}

?>