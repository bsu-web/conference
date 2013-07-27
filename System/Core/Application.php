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

	public function loadConfig($cfg){
		$xml = new \System\Config\Reader\XML;
		$config = $xml->readFromFile(APP.DS."Config".DS."config.xml");
		self::$app_data = $config;
	}

	public function getRouteById($route_id){
		foreach( self::$app_data->routes->route as $route ){
			if( $route["id"] == $route_id ){
				return $route;
			}
		}
		return null;
	}

	public function getCommandById($command_id){
		foreach( self::$app_data->commands->command as $command ){
			if( $command["id"] == $command_id ){
				return $command;
			}
		}
		return null;
	}

	public function getFilterById($filter_id){
		foreach( self::$app_data->filters->filter as $filter ){
			if( $filter["id"] == $filter_id ){
				return $filter;
			}
		}
		return null;
	}

	public function getViewById($view_id){
		foreach( self::$app_data->views->view as $view ){
			if( $view["id"] == $view_id ){
				return $view;
			}
		}
		return null;
	}
}