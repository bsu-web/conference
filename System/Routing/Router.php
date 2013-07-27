<?php
namespace System\Routing;

use System\Core\Application;

/**
 * Router, он же модернизированный ControllerMap --
 * сопоставляет строку запроса с именем команды, которая должна быть выполнена
 * @author nekjine
 */
class Router {
	protected $_routes			= array();
/*
	protected $_commands 		= array();
	protected $_views 			= array();
	protected $_required_params = array();
	protected $_params 	= array();
*/
	public function __construct(){

	}
	/**
	 * Сопоставляет имя команды запросу
	 * 
	 */
	/*
	public function setCommand($path, $command){
		$this->_commands[$path] = $command;
	}

	public function getCommand($path){
		if(isset($this->_commands[$path])){
			return $this->_commands[$path];
		}
		return null;
	}

	public function setView($path, $view){
		$this->_views[$path] = $view;
	}

	public function getView($path){
		if(isset($this->_views[$path])){
			return $this->_views[$path];
		}
		return null;
	}
	*/

	/**
	* Для /show/{id}/{action}/{*funky} должен вернуть array("id", "action")
	*/
	public function _getParams($path){
		$results = null;
		preg_match_all("/\{([a-z\*\_]{1,16})\}/", $path, $results);
		return $results[1];
	}

	//public function setParamPattern($path, $param, $pattern){
	//	if(!isset($this->_params[$path])){
	//		$this->_params[$path] = array();
	//	}
	//	$this->_params[$path][$param] = $pattern;
	//}
//
	//public function getParamPattern($path, $param){
	//	if(is_array($this->_params[$path])){
	//		if(isset($this->_params[$path][$param])){
	//			return $this->_params[$path][$param];
	//		}
	//	}
	//	return null;
	//}

	public function match($str){
		//$found = false;
		foreach($this->_routes as $pattern => $route){
			//echo str_replace("/", "\/", $pattern) . "\n";
			if( preg_match("/^".str_replace("/", "\/", $pattern)."$/", $str, $param_matches) > 0 ){
				
				// var_dump($route["params"]);
				//foreach($route["params"] as $param){
					
				//}

				return $route;
			}
		}
		return null;
		// if(!class_exists("Application\Commands\DefaultCommand", false)){
		// 	App::loadController("DefaultController");
		// }
		// 
		// return array("controller"=>"DefaultController", "action"=>"Index");
	}

	public function getDefaultRoute(){
		if(!isset($this->_routes["~"])){
			throw new \Exception("Default route is not specified");
		}
		return $this->_routes["~"];
	}

	// public function generateURL($command_name, $parameters){
	// 	$path = array_search($command_name, $this->_commands, true);
	// 	if($path === false){
	// 		return null;
	// 	}
	// 	$req_params = $this->_getParams($path);
// 
	// 	$url = $path;
	// 	foreach($req_params as $req_param_name){
	// 		// echo "gKey is $gKey<br />";
	// 		// var_dump($parameters);
	// 		if(!isset( $parameters[$req_param_name])){
	// 			// error
	// 			throw new \Exception("Missing required parameter: $req_param_name");
	// 			// return null;
	// 		}
	// 		$url = str_replace("{{$req_param_name}}", $parameters[$req_param_name], $url);
	// 	}
// 
	// 	return $url;
	// }

	/**
	* PS/TODO: Находит ТОЛЬКО один паттерн для команды
	*/
	public function generateURL($route_id, $params){
		/*
		$found = false;
		foreach($this->_routes as $key=>$val){
			if($val["cmd"] == $command_name){
				$found = true;
				$path = $val["path"];
				break;
			}
		}
		if(!$found){
			throw new Exception("No route with this command was found");
		}

		$req_params = $this->_getParams($path);

		$url = $path;
		foreach($req_params as $req_param_name){
			// echo "gKey is $gKey<br />";
			// var_dump($parameters);
			if(!isset( $parameters[$req_param_name])){
				// error
				throw new \Exception("Missing required parameter: $req_param_name");
				// return null;
			}
			$url = str_replace("{{$req_param_name}}", $parameters[$req_param_name], $url);
		}

		$prefix = Application::instance()->_url_prefix;
		return $prefix . $url;
		*/
		$app = Application::instance();

		foreach($params as $pkey=>$pvalue){

		}
	}

	/**
	* Добавить новый маршрут
	* @param string $path Путь маршрута, например "/profile/{user_id}"
	* @param string $command_name Имя класса для команды выполнения
	* @param string $view_name Имя представления (шаблона)
	* @param array $params Массив регулярных выражений для параметров, array("uid" => "[0-9]{1,8}")
	*/
	public function addRoute($route_id, $path, $command_name, $view_name=null, $params=null){
		/*
		// все-е паттерны
		$all_params = $params;
		// все имена параметров в path
		$all_params = $this->_getParams($path);
		// все паттерны (брат $all_params), для str_replace
		$all_patterns = array();

		// во "все паттерны" пишем недостающие регекспы по-умолчанию, также оборачиваем их для будущего preg_match
		foreach($all_params as $ap_param_name){
			if(!isset($all_params[$ap_param_name])){
				$all_params[$ap_param_name] = "([0-9a-zA-Z]{1,32})";
			}else{
				$all_params[$ap_param_name] = "(".$all_params[$ap_param_name].")";
			}
		}

		// готовим закваску для str_replace, чтобы подставить регекспы в $path на место плейсхолдеров "{$var}"
		foreach($all_params as $a_key => $a_param){
			$all_patterns[] = $all_params[$a_param];
			$all_params[$a_key] = "{".$a_param."}";
		}

		$route_pattern = str_replace($all_params, $all_patterns, $path);

		$this->_routes[$route_pattern] = array(
			"cmd" => $cmd,
			"view" => $view,
			"path" => $path,
			"params" => $params
		);
		*/
		// меняем все {параметры} на их (регулярные выражения)
		$pattern = preg_replace_callback(
			"/\{([a-z0-9\_]{1,32})\}/", 

			function($x) use($params) {
				return "(".$params[$x[1]].")";
			}
		,$path);

		$this->_routes[$route_id] = array(
			"pattern" => $pattern,
			"cmd" => $command_name
		);
		if(!is_null($view_name)){
			$this->_routes[$route_id]["view"] = $view_name;
		}
		if(!is_null($params)){
			$this->_routes[$route_id]["params"] = $params;
		}

		//var_dump($this->_routes[$route_pattern]);
		// echo "Add new route with pattern " .$route_pattern."\n";
	}
}