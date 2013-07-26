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
	protected $router;

	public function __construct($req, $res){
		$this->req = $req;
		$this->res = $res;
		$this->router = new Router;
		/**
		* Загружаем все маршруты в роутер
		*/
		foreach( Application::instance()->config->routemap->route as $route ){
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
		Application::instance()->_url_prefix = URIParser::extractPrefix( $req->getURI() );
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

		do{
			$refl_cmd = new \ReflectionClass($cmdname);
			if( !$refl_cmd->isSubClassOf( $base_cmd_classname ) ){
				throw new \Exception($cmdname . " does not extend ".$base_cmd_classname);
			}
			
			$cmd = new $cmdname;
			$result = $cmd->doExecute();

			if(is_null($result) || isset($result["params"])){
				if($route["view"] == ""){
					throw new \Exception("View for ".$cmdname." is not specified");
				}
				// go view
				require ROOT.DS."smarty".DS."Smarty.class.php";
				$smarty = new \Smarty;
				if(isset($result["params"])){
					$smarty->assign( $result["params"] );
				}
				$this->res->write($smarty->fetch(APP.DS."View".DS.$route["view"].".tpl"));
			}elseif(isset($result["redirect"])){
				$this->res->setRedirection($result["redirect"]);

			}elseif(isset($result["forward"])){
				$cmdname = "\\Application\\Command\\".$result["forward"];
				continue;
			}
			break;
		}
		while(true);
	}
}