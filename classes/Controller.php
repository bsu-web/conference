<?php
/**
* Базовый контроллер
**/

class Controller {
	private function __construct() {}
	/**
	* Запуск контроллера
	**/
	static function run(){
		$instance = new Controller();
		$instance->init();
		$instance->handleRequest();
	}
	/**
	* Инициализация
	**/
	function init(){
	}
	/**
	* Обработка запроса
	**/
	function handleRequest(){
		$request = new Request();
		$cmd_res = new CommandResolver();
		$cmd = $cmd_res->getCommand($request);
		$cmd->execute($request);
	}
}
?>