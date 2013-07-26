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
	protected $_param_patterns 	= array();
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
	//	if(!isset($this->_param_patterns[$path])){
	//		$this->_param_patterns[$path] = array();
	//	}
	//	$this->_param_patterns[$path][$param] = $pattern;
	//}
//
	//public function getParamPattern($path, $param){
	//	if(is_array($this->_param_patterns[$path])){
	//		if(isset($this->_param_patterns[$path][$param])){
	//			return $this->_param_patterns[$path][$param];
	//		}
	//	}
	//	return null;
	//}

	public function match($str){
		$found = false;
		foreach($this->_routes as $pattern => $route){
			if( preg_match("/^".preg_quote($pattern, "/")."$/", $str) > 0 ){
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
		if(!isset($this->_routes["*"])){
			throw new \Exception("Default route is not specified");
		}
		return $this->_routes["*"];
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
	public function generateURL($command_name, $parameters){
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
	}

	/**
	* Добавить новый маршрут
	*/
	public function addRoute($path, $cmd, $view, $param_patterns){
		// все-е паттерны
		$all_param_patterns = $param_patterns;
		// все имена параметров в path
		$all_params = $this->_getParams($path);
		// все паттерны (брат $all_params), для str_replace
		$all_patterns = array();

		// во "все паттерны" пишем недостающие регекспы по-умолчанию, также оборачиваем их для будущего preg_match
		foreach($all_params as $ap_param_name){
			if(!isset($all_param_patterns[$ap_param_name])){
				$all_param_patterns[$ap_param_name] = "([0-9a-zA-Z]{1,32})";
			}else{
				$all_param_patterns[$ap_param_name] = "(".$all_param_patterns[$ap_param_name].")";
			}
		}

		// готовим закваску для str_replace, чтобы подставить регекспы в $path на место плейсхолдеров "{$var}"
		foreach($all_params as $a_key => $a_param){
			$all_patterns[] = $all_param_patterns[$a_param];
			$all_params[$a_key] = "{".$a_param."}";
		}

		$route_pattern = str_replace($all_params, $all_patterns, $path);

		$this->_routes[$route_pattern] = array(
			"cmd" => $cmd,
			"view" => $view,
			"path" => $path
		);
	}
}