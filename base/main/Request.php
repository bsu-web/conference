<?php
/**
* класс Запроса
**/
class Request {
	/**
	* Параметры запроса
	* @var array
	**/
	protected $params;

	/**
	* Строка запроса (/messages)
	* @var string
	**/
	protected $request;

	// /**
	// * @var string
	// **/
	// protected $subject;

	/**
	* Метод запроса
	* @var int
	**/
	protected $method;

	/**
	* Конструктор Запроса, может получить строку, метод и параметры запроса
	**/
	function __construct($request=null, $method=null, $params=null){
		if(is_null($request)){
			$this->init();
		}else{
			$this->request = $request;
			//$this->subject = $subject;
			$this->method = $method;
			$this->params = $params;
		}
	}

	/**
	* Само-инициализация Запроса в текущем окружении
	* @return void
	**/
	protected function init(){
		$this->method = REQUEST_METHOD;
		//$this->subject = $this->_parseSubject(REQUEST);
		$this->request = REQUEST;
		$this->params = $_REQUEST;
	}

	/**
	* Получает значение параметра запроса
	* @param string $param_key Имя параметра запроса
	* @return string Значение параметра запроса
	**/
	public function getParam($param_key){
		if(!isset($this->params[$param_key])){
			return null;
		}
		return $this->params[$param_key];
	}

	/**
	* Получает все параметры запроса
	* @return array Массив всех параметров запроса
	**/
	public function getParams(){
		return $this->params;
	}

	//public function getSubject(){
	//	return $this->subject;
	//}

	/**
	* Получает строку запроса
	* @return string Строка запроса
	**/
	public function getRequest(){
		return $this->request;
	}

	/**
	* Получает метод запроса
	* @return string Метод запроса
	**/
	public function getMethod(){
		return $this->method;
	}

	//protected function _parseSubject($request_uri){
	//	$sec_slash = strpos($request_uri, "/", 1);
	//	if($sec_slash !== false){
	//		return substr($request_uri, 0, $sec_slash);
	//	}
	//	return $request_uri;
	//}
}