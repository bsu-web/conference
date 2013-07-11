<?php
/**
* Роутер, служащий для расшифровки запроса и сопоставления контроллера
**/
class Router {
	/**
	* Маршруты
	* @var array
	**/
	protected $routes;

	/**
	* Конструктор, может принимать массив маршрутов
	* @param array $arr Array of routes
	**/
	public function __construct($arr = null){
		if(is_array($arr)){
			foreach($arr as $pattern => $route){
				$this->addRoute($pattern, $route["method"], $route["controller"], $route["action"]);
			}
		}
	}

	/**
	* Добавляет новый маршрут
	* @throws Exception
	* @param string $pattern Шаблон для маршрута
	* @param int $method Допустимые методы запроса для маршрута (для нескольких используется побитовое сложение)
	* @param string $controller Имя контроллера
	* @param string $action Имя действия этого контроллера
	* @return void
	**/
	public function addRoute($pattern, $method = Utils::METHOD_GET, $controller, $action){
		if(isset($this->routes[$pattern])){
			throw new Exception("Route redefenition");
		}else{
			$this->routes[$pattern] = array(
				"method" => $method,
				"controller" => $controller,
				"action" => $action
			);
		}
	}

	/**
	* Сопоставляет данный запрос
	* @param Request $request Запрос для сопоставления
	* @return array Строка маршрута, соответствующая данному запросу, содержит имя контроллера, действие, методы и проч.
	**/
	public function match(Request $request){
		$found = false;
		foreach($this->routes as $pattern => $route){
			if( $request->getMethod() & $route["method"] ){
				if( preg_match("/^".str_replace("/", "\/", $pattern)."$/", $request->getRequest()) > 0 ){
					return $route;
				}
			}
		}

		if(!class_exists("DefaultController", false)){
			App::loadController("DefaultController");
		}
		
		return array("controller"=>"DefaultController", "action"=>"index");
	}
}