<?php
class Request{
	private $properties;
	private $feedback=array();

	function __construct(){
		$this->init();
		RequestRegistry::setRequest($this);
	}
	function init(){
		if (isset($_SERVER['REQUEST_METHOD'])){
			$this->properties=$_REQUEST;
			$this->setProperty("_method", $_SERVER["REQUEST_METHOD"]);
			return;
		}
		foreach ($_SERVER['argv'] as $arg){
			if (strpos($arg,'=')){
				list($key,$val)=explode('=');
				$this->setProperty($key,$val);
			}
		}
	}
	function getProperty($key){
		if (isset($this->properties[$key])){
			return $this->properties[$key];
		}
	}
	function setProperty($key,$val){
		$this->properties[$key]=$val;
	}
	function addFeedback($msg){
		array_push($this->feedback,$msg);
	}
	function getFeedback(){
		return $this->feedback;
	}
	function getFeedbackString($separator="\n"){
		return implode($separator,$this->feedback);
	}
}
?>
