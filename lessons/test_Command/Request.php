<?php
require_once 'RequestRegistry.php';
/** 
 * @author user
 * 
 */
class Request {
	private $properties;
	private $feedback = array();
	
	public function __construct(){
		$this->init();
		RequestRegistry::setRequest($this);
	}
	
	public function init(){
		if (isset($_SERVER['REQUEST_METHOD'])) {
			$this->properties = $_REQUEST;
			return;
		}
		foreach ($_SERVER['argv'] as $arg){
			if (strpos($arg, '=')) {
				list($key, $val) = explode("=", $arg);
				$this->setProperty($key, $val);
			}
		}
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