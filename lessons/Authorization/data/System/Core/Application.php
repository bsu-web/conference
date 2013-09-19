<?php
namespace System\Core;

class Application {
	const CONFIG_FILE_NAME = "config.xml";

	static private $instance;
	private $app_data = array();

	const DIR_VIEW = "View";
	const DIR_MODEL = "Model";
	const DIR_CONFIG = "Config";
	const DIR_COMMAND = "Command";

	private function __construct(){
		$this->loadConfig();
	}

	static public function instance(){
		if(!self::$instance){
			self::$instance = new Application;
		}
		return self::$instance;
	}

	public function set($key, $val){
		$this->app_data[$key] = $val;
	}

	public function get($key){
		return $this->app_data[$key];
	}

	// DELETE
	public function __get($key){
		if(!isset($this->app_data[$key])){
			return null;
		}
		return $this->app_data[$key];
	}

	// DELETE
	public function __set($key, $value){
		if($key[0] == "_" && isset($this->app_data[$key])){
			throw new \Exception("You can not overwrite read-only key");
		}
		$this->app_data[$key] = $value;
	}

	public function getData(){
		return $this->app_data["config"];
	}

	private function loadConfig(){
		$xml = new \System\Config\Reader\XML;
		$config = $xml->readFromFile(APP.DS.self::DIR_CONFIG.DS.(self::CONFIG_FILE_NAME));

		$this->app_data["config"] = $config;
	}

	public function getRouteById($route_id){
		foreach( $this->getData()->routes->route as $route ){
			if( (string)$route["id"] == $route_id ){
				return $route;
			}
		}
		return null;
	}
/*
	public function getCommandById($command_id){
		foreach( $this->getData()->commands->command as $command ){
			if( (string)$command["id"] == $command_id ){
				return $command;
			}
		}
		return null;
	}
*/
	public function getCommandByClass($command_class){
		foreach( $this->getData()->commands->command as $command ){
			if( (string)$command["class"] == $command_class ){
				return $command;
			}
		}
		return null;
	}

	public function getViewById($view_id){
		foreach( $this->getData()->views->view as $view ){
			if( (string)$view["id"] == $view_id ){
				return $view;
			}
		}
		return null;
	}

	public function getPatternById($pattern_id){
		foreach( $this->getData()->patterns->pattern as $pattern ){
			if( (string)$pattern["id"] == $pattern_id ){
				return $pattern;
			}
		}
		return null;
	}
}