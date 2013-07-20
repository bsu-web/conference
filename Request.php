<?php
require_once 'RequestRegistry.php';
/** 
 * The holy grail 
 */

class Request {
	private $properties;
	private $feedback = array();
	
	public function __construct(){
		$this->init();
		RequestRegistry::setRequest($this);
	}
	
	public function init(){
		/*if (isset($_SERVER['REQUEST_METHOD'])) {
			$this->properties = $_REQUEST;				//просто вытянули из $_REQUEST
			return;
		}*/
		/*foreach ($_SERVER['argv'] as $arg){
			if (strpos($arg, '=')) {
				list($key, $val) = explode("=", $arg);  //name=value
				$this->setProperty($key, $val);
			}
		}*/
		$key=0;
		$argv = explode('/', $_SERVER['REQUEST_URI']);
		
		$this->setProperty('cmd', $argv[1]);
		$argv = array_splice($argv, 2);
		foreach ($argv as $arg){						//value/value2/value3/...
			$this->setProperty($key, $arg);
			$key++;
		}
		
		/*$cmd = $argv[2].$argv[1];
		$this->setProperty('cmd', $cmd);
		 $argv = array_splice($argv, 3);
				foreach ($argv as $arg){				//type/command/value1/value2/...    cmd=commandType
				$this->setProperty($key, $arg);
				$key++;
		}*/
	}
	
	public function getProperty($key){
		if (isset($this->properties[$key])) {
			return $this->properties[$key];
		}
		return null;
	}
	
	public function setProperty($key, $val){
		$this->properties[$key] = $val;
	}
	
	public function addFeedback($msg){
		array_push($this->feedback, $msg);
	}
	
	public function getFeedback(){
		return $this->feedback;
	}
	
	public function getFeedbackString($separator="\n"){
		return implode($separator, $this->feedback);
	}
	
	public function getLastCommand(){
		if (isset($this->properties['last_cmd'])) {
			return $this->properties['last_cmd'];;
		}
		return null;
	}
	
	public function setLastCommand($cmd){
		$this->properties['last_cmd'] = $cmd;
	}
	
	
	
}

?>