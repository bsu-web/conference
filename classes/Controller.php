<?php
require_once('ApplicationHelper.php');
require_once('commandResolver.php');
require_once('Request.php');
class Controller{
	private $applicationHelper;
	private function __construct(){
		
	}
	static function run(){
		$instance=new Controller();
		//$instance->init();
		$instance->handleRequest();
	}
	function init(){
		$applicationHelper=ApplicationHelper::instance();
		$applicationHelper->init();
	}
	function handleRequest(){
		$request=new Request();
		$cmd_r=new CommandResolver();
		$cmd=$cmd_r->getCommand($request);
		$cmd->execute($request);
	}
}
?>