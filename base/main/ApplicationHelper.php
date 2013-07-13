<?php
class ApplicationHelper {
	protected static $config;
	private static $instance;
	
	private function __construct(){}
	
	static function instance(){
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public static function getConfig($key){
		if(!isset(self::$config[$key])){
			return null;
		}
		return self::$config[$key];
	}

	protected static function setConfig($key, $value){
		self::$config[$key] = $value;
	}
	
	public static function loadConfig($cfgFile, $notHere=false){
		$cfg = include(APP.SLASH."configs".SLASH.$cfgFile.".php");
		if(!is_null($cfg) && is_array($cfg)){
			if($notHere){
				return $cfg;
			}else{
				foreach($cfg as $key=>$value){
					self::setConfig($key, $value);
				}
			}
		}
	}
	
}
?>