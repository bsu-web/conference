<?php
/**
* Класс Приложение, содержит связки с внешней средой
* TODO: меньше статики
* TODO: убрать бардак
* TODO: дополнить документацией
* 
**/
class App {
	/**
	* @var array
	**/
	protected static $config;

	private function __construct(){}

	public static function getConfig($key){
		if(!isset(self::$config[$key])){
			return null;
		}
		return self::$config[$key];
	}

	protected static function setConfig($key, $value){
		self::$config[$key] = $value;
	}

	public static function init(){
		
	}

	public static function autoload($className){
		self::loadClass($className);
	}

	public static function loadController($controllerName){
		self::loadClass($controllerName, array(APP.SLASH."controllers"), "Controller");
	}

	protected static function loadClass($className, $overridePath=null, $shouldInheritFrom=null){

		if(is_null($overridePath)){
			$paths = array(
				APP . SLASH . "models",
				/*APP . SLASH . "controllers",*/
				APP . SLASH . "views",
				BASE . SLASH . "main"
			);
		}else{
			$paths = $overridePath;
		}

		$fileName = $className . ".php";
		$found = false;

		foreach($paths as $path){
			$filePath = $path .SLASH. $fileName;
			if(is_readable($filePath)){
				include_once($filePath);
				if(!class_exists($className, false)){
					throw new Exception("Class $className not found in file $filePath");
				}else{
					if(!is_null($shouldInheritFrom)){
						$class_refl = new ReflectionClass($className);
						if(!$class_refl->isSubClassOf($shouldInheritFrom)){
							throw new Exception("Class inheritance is wrong");
						}
					}

					$found = true;
				}
			}
		}
		if(!$found){
			//throw new Exception("Class file not found");
		}
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

	public static function getSmarty(){
		$smarty = new Smarty();
		$smarty->setTemplateDir( App::getConfig("smarty_templates_dir") );
		$smarty->setCacheDir( App::getConfig("smarty_cache_dir") );
		$smarty->setCompileDir( App::getConfig("smarty_compile_dir") );
		$smarty->caching = App::getConfig("smarty_cache");
		return $smarty;
	}

	public static function sessionStart(){
		/**
		* ??? убрать как появится нормально настроенный веб-сервер
		**/
		//session_save_path(APP.SLASH."tmp");
		session_save_path("C:\\Windows\\temp");
		/*******/
		session_start();
	}
}