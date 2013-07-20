<?php

require_once 'Request.php';
require_once 'ApplicationRegistry.php';
require_once 'ApplicationHelper.php';
/** 
 * @author user
 * 
 */
class Controller {
	private $applicationHelper;
	
	private function __construct() {}
	
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