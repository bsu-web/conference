<?php
require_once('Registry.php');
class SessionRegistry extends Registry{
	private static $instance;
	
	private function __construct(){
		session_start();
	}
	
	static function instance(){
		if ( !isset(self::$instance) ){
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	protected function get($key){
		if ( isset($_SESSION[__CLASS__][$key]) ){
			return $_SESSION[__CLASS__][$key];
		}
		return null;
	}
	
	protected function set($key, $val){
		$_SESSION[__CLASS__][$key] = $val;
	}
	
	public function setComplex(Complex $complex){
		self::instance()->set('complex', $complex);
	}
	
	public function getComplex(){
		return self::instance()->get('complex');
	}
	
}
?>
