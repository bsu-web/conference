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

	private function __construct(){
	
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

	public static function getSmarty(){
		$smarty = new Smarty();
		$smarty->setTemplateDir( ApplicationHelper::getConfig("smarty_templates_dir") );
		$smarty->setCacheDir( ApplicationHelper::getConfig("smarty_cache_dir") );
		$smarty->setCompileDir( ApplicationHelper::getConfig("smarty_compile_dir") );
		$smarty->caching = ApplicationHelper::getConfig("smarty_cache");
		return $smarty;
	}

}