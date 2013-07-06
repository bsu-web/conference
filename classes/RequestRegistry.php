<?php
require_once('Registry.php');
class RequestRegistry extends Registry{
	private $values = array();
	private static $instance;
	
	private function __construct(){}
	
	static function instance(){
		if ( !isset(self::$instance) ){
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	protected function get($key){
		if ( !isset($this->$values[$key]) ){
			return $this->$values[$key];
		}
		return null;
	}
	
	protected function set($key, $val){
		$this->$values[$key] = $val;
	}
	
	public function setRequest(Request $request){
		self::instance()->set('request', $request);
	}
	
	public function getRequest(){
		return self::instance()->get('request');
	}
	
}
?>