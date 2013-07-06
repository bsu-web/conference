<?php
class Registry{
	private static $instance;
	private $values = array();
	
	private function __construct(){}
	
	static function instance(){
		if (!isset(self::$instance)){
				self::$instance = new self();
		}
		return self::$instance;
	}
	
	function get($key){
		if (isset($this->values[$key])){
			return $this->values[$key];
		}
	return null;
	}
	
	function set($key, $value){
		$this->values[$key] = $value;
	}
}

class Cow{
	private $name;
	
	function __construct($name){
		$this->name = $name;
	}
	
	function setName($name){
		$this->name = $name;
	}
	
	function getName(){
		return 'I am a cow.My name is '.$this->name.'<br>';
	}
}

class Fasade{
	private $reg;
	
	function __construct (){
		$this->reg = Registry::instance();
	}
	function command($action, $object = null){
		switch($action){
		case 'registr' : 
			echo 'Registration.<br>';
			break;
		case 'save':
			echo 'Save.<br>';
			break;			
		case 'create' :
			$cow12 = new Cow($object);
			echo 'Create. : '.$cow12->getName();
			break;	
		}
	}
}

$fas = new Fasade();
$fas->command('create', 'Matilda');
$fas->command('registr');
$fas->command('save');

?>