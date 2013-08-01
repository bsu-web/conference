<?php
namespace System\Core;

use \System\Network\Request;
use \System\Network\Response;

abstract class Command {
	protected $data;
	protected $req;

	/**
	* Конструктор
	* @param Request $request Объект http запроса
	* @param array $data Массив параметров команды
	* @return void
	**/
	final public function __construct(Request $request, $data = null){
		$this->req = $request;
		$this->data = $data;
	}

	/**
	* Метод для переопределения
	* @return mixed
	**/
	abstract protected function exec();

	/**
	* Метод для выполнения диспетчером
	* @return mixed
	**/
	public function _exec(){
		return $this->exec();
	}

	/**
	* Что может вернуть команда
	**/

	/**
	* HTTP перенаправление на абсолютный URI
	* @param string $uri URI
	* @param int $status HTTP статус перенаправления (3xx)
	* @return array Массив с соответствующими данными, который отдаётся в диспетчер
	**/
	final protected function redirect($uri, $status = 302){
		if(is_int($status) == false || $status < 300 || $status > 307){
			$status = 302;
		}
		return array(
			"do"=>"redirectToURI",
			"uri"=>$uri,
			"status"=>$status
		);
	}

	/**
	* HTTP перенаправление на некоторый маршрут
	* @param array $options Массив с параметрами перенаправления
	* @return array Массив с соответствующими данными, который отдаётся в диспетчер
	**/
	/*
	final protected function redirectToRoute($route_id, $route_params){
		// $options[uri]
		// $options[route]
		// $options[params]
		// $options[status]
		return array(
			"do"=>"redirectToRoute",
			"route_id"=>$route_id,
			"route_params"=>$route_params
		);
	}
	*/
	/**
	* Внутреннее перенаправление на другую команду
	* @param array $options Массив с параметрами внутреннего перенаправления
	* @return array Массив с соответствующими данными, который отдаётся в диспетчер
	**/
	final protected function forward($command, $params){
		// $options[command]
		// $options[params]
		return array(
			"do"=>"forward",
			"command_class"=>$command,
			"command_params"=>$params
		);
	}

	/**
	* Команду на вывод представления
	* @param array $options Массив с параметрами, о которых должно знать представление
	* @return array Массив с соответствующими данными, который отдаётся в диспетчер
	**/
	final protected function render($params = null, $explicitView = null){
		// $options[key]
		return array(
			"do"=>"render",
			"view_params" => $params,
			"explicit_view_name"=> $explicitView
		);
	}

	/**
	*
	*
	**/
	final protected function generateURL($route_id, $route_params){
		return \System\Core\Application::instance()->get("router")->generateURL($route_id, $route_params);
	}
}