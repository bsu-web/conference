<?php

require_once 'Request.php';
require_once 'ApplicationRegistry.php';
require_once 'ApplicationHelper.php';


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
			$cmd->execute($request);
		}
		$this->invokeView($app_c->getView($request));
	}

	public function invokeView($target){
		/**
		 * TODO: No passchecks ???
		 */
		//include("view/$target.php");
		include("smarty/Smarty.class.php"); // not good
		$smarty = new Smarty;
		
		$smarty->assign("Request", RequestRegistry::instance()->getRequest());
		$smarty->display("view/${target}.tpl"); // not good


		exit; // too bad
	}
	
}

?>