<?php
namespace System\Core;

use System\Core\Application;
use System\Utils\URIParser;

use System\Network\Request;
use System\Network\Response;

use System\Routing\Router;

/**
 * @author nekjine
 */
class Dispatcher {
	protected $req;
	protected $res;
	protected $app;

	protected $router;

	public function __construct($req, $res){
		$this->req = $req;
		$this->res = $res;
		$this->router = new Router;
		/**
		* Загружаем все маршруты в роутер
		*/
		foreach( $this->app->config->routes->route as $route ){
			$path = (string)$route["path"];
			$cmd = (string)$route->command;
			$view = (string)$route->view;
			$param_patterns = array();
			foreach( $route->param_pattern as $pp ){
				$param_patterns[ (string)$pp["param"] ] = (string)$pp;
			}
			$this->router->addRoute( $path, $cmd, $view, $param_patterns );
		}
		/**
		* Установить префикс для generateURL(), на случай, если система не в корневой директории веб-сервера
		* Например, если система расположена в /var/webserver/mysite.com/www/dir1/dir2/dir3,
		* то все ссылки должны будут иметь префикс "/dir1/dir2/dir3"
		*/
		$this->app->_url_prefix = URIParser::extractPrefix( $req->getURI() );
	}

	/**
	* Диспетчеризация
	*/
	public function dispatch(){
		$route = $this->router->match(URIParser::extractRequest( $this->req->getURI() ));
		
		if($route == null){
			$route = $this->router->getDefaultRoute();
		}

		$base_cmd_classname = "\\System\\Core\\Command";
		$cmdname = "\\Application\\Command\\".$route["cmd"];
		$cmd_params = $route["i_params"];
		$first_iter = true;

		do{
			// checkin'
			$refl_cmd = new \ReflectionClass($cmdname);
			if( !$refl_cmd->isSubClassOf( $base_cmd_classname ) ){
				throw new \Exception($cmdname . " does not extend ".$base_cmd_classname);
			}
			
			// instantiate
			$cmd = new $cmdname( $cmd_params );
			$result = $cmd->doExecute();

			/*
			array(
				"action" => "view|forward|redirect",
				["view" => "View name",]
				["forward" => "Command name",]
				["redirect" => "Location",]
				["params" => array "Params to View|Command"]
			)
			*/
			// see result
			if(is_null($result)){
				$result["action"] = "view";
			}

			if($result["action"] == "view"){
				$view_to_render = "";

				if($first_iter){
					if(isset($route["view"])){
						$view_to_render = $route["view"];
					}else{
						if(isset($result["view"])){
							$view_to_render = $result["view"];
						}else{
							throw new \Exception("View for ".$cmdname." is not specified");
						}
					}
				}else{

				}
				// go view
				require ROOT.DS."smarty".DS."Smarty.class.php";
				$smarty = new \Smarty;

				$tpl_name = "";
				if(isset($result["view"])){
					if(isset($result["view"]["name"])){
						$tpl_name = $result["view"]["name"];
					}
				}
				if(isset($result["view"])){
					$smarty->assign( $result["view"] );
				}
				$this->res->write($smarty->fetch(APP.DS."View".DS.$route["view"].".tpl"));
				$first_iter = false;
			}elseif(isset($result["redirect"])){
				$this->res->setRedirection($result["redirect"]);
			}elseif(isset($result["forward"])){
				$cmd_params = $result["forward"]["params"];
				$cmdname = "\\Application\\Command\\".$result["forward"]["to"];
				$first_iter = false;
				continue;
			}
			break;
		}
		while(true);
	}
}