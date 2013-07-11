<?php
/**
* Стартер всего (-> static?)
**/
class Bootstrapper {
	/**
	* Роутер
	* @var Router
	**/
	protected $router;

	/**
	* Конструктор, загружает конфиги и инициализирует роутер
	**/
	public function __construct(){
		App::loadConfig("db");
		App::loadConfig("smarty");
		$routeMap = App::loadConfig("routemap", true);

		$this->router = new Router( $routeMap );
	}

	/**
	* Запуск
	* Ищет соответствующий контроллер для входного запроса
	* Загружает контроллер и запускает его действие (action) 
	* @param Request $request Входной запрос
	* @return void
	**/
	public function boot(Request $request){
		$result = $this->router->match($request);

		$controller_name = $result["controller"];
		$action_name = $result["action"];

		App::loadController($controller_name);

		$controller_refl = new ReflectionClass($controller_name);
		if( !$controller_refl->hasMethod($action_name) ){
			throw new Exception("Controller ${controller_name} does not implements required methods, review your route table");
		}

		$controller = $controller_refl->newInstance( $request );
		$controller->$action_name();
	}

}