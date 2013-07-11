<?php
class App {
	//public static $Registry = null;

	private function __construct(){}

	public static function init(){
	//	$Registry = new Registry;
	}

	public static function autoload($className){
		$paths = array(
			APP . SLASH . "models",
			APP . SLASH . "controllers",
			APP . SLASH . "views",
			BASE . SLASH . "main"
		);
		$fileName = $className . ".php";
		$found = false;
		foreach($paths as $path){
			$filePath = $path .SLASH. $fileName;
			if(is_readable($filePath)){
				include_once($filePath);
				if(!class_exists($className)){
					throw new Exception("Class not found in file");
				}else{
					$found = true;
				}
			}
		}
		if(!$found){
			throw new Exception("Class file not found");
		}
	}
}