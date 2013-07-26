<?php
namespace System\Core;

class Application {
	static protected $instance;
	static protected $app_data = array();

	protected function __construct(){

	}

	static public function instance(){
		if(!self::$instance){
			self::$instance = new Application;
		}
		return self::$instance;
	}

	public function __get($key){
		if(!isset(self::$app_data[$key])){
			return null;
		}
		return self::$app_data[$key];
	}

	public function __set($key, $value){
		if($key[0] == "_" && isset(self::$app_data[$key])){
			throw new \Exception("You can not overwrite read-only key");
		}
		self::$app_data[$key] = $value;
	}
}