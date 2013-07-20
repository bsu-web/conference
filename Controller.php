<?php

/** 
 * @author user
 * 
 */
class Controller {
	private $applicationHelper;
	
	private function __construct() {}
	
	public static function autoload($className){
		self::loadClass($className);
	}
	protected static function loadClass($className){
	
		$paths = array(
				ROOT,
				/*APP . DS . "models",
				APP . DS . "controllers",
				APP . DS . "views",
				BASE . DS . "main"*/
		);
	
		$fileName = $className . ".php";
		$found = false;
	
		foreach($paths as $path){
			$filePath = $path .DS. $fileName;
			if(is_readable($filePath)){
				include_once($filePath);
				if(!class_exists($className, false)){
					throw new Exception("Class $className not found in file $filePath");
				}else					
					$found = true;
			}
		}
		if(!$found){
			//throw new Exception("Class file not found");
		}
	}
	
	public static function run(){
		$instance = new Controller();
		$instance->init();
		$instance->handleRequest();
	}
	
	public function init(){
		$applicationHelper = ApplicationHelper::instance();
		$applicationHelper->init();
	}
	
	public function handleRequest(){
		$request = new Request();
		$app_c = ApplicationRegistry::appController();
		while ($cmd = $app_c->getCommand($request)){
			//print "Выполняется ".get_class($cmd)."\n";
			$cmd->execute($request);
		}
		$this->invokeView($app_c->getView($request));
	}
	
	public function invokeView($target){
		include("view/$target.php");
		exit;
	}
}

?>