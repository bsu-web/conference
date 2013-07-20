<?php

/** 
 * @author user
 * 
 */
class RequestRegistry extends Registry{
	private $values = array();
	private static $instance;
	
	private function __construct() {}
	
	public static function instance(){
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	protected function get($key){
		if (isset($this->values[$key])) {
			return $this->values[$key];
		}
		return null;
	}
	
	protected function set($key, $val){
		$this->values[$key] = $val;
	}
	
	public static function getRequest(){
		return self::instance()->get('request');
	}
	
	public static function setRequest(Request $request){
		return self::instance()->set('request', $request);
	}
	
	
}

?>