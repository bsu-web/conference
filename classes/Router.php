<?php
/**
* Basic router
**/
class Router {
	private $routeMap = array();
	
	private static $basicRouteController_refl = NULL;
	private static $errorRouteController = NULL;
	private static $defaultRouteController = NULL;

	const METHOD_UNKNOWN 	= 0;
	const METHOD_GET 		= 1;
	const METHOD_POST 		= 2;
	const METHOD_OPTIONS 	= 4;
	const METHOD_HEAD 		= 8;
	const METHOD_PUT 		= 16;
	const METHOD_DELETE 	= 32;
	const METHOD_TRACE 		= 64;
	const METHOD_CONNECT 	= 128;

	function __construct(){
		if(self::$basicRouteController_refl == NULL){
			self::$basicRouteController_refl = new ReflectionClass("RouteController");
			self::$errorRouteController = new ErrorRouteController();
			self::$defaultRouteController = new DefaultRouteController();
		}
		// $this->addRoute("tierra", self::METHOD_GET, NULL, NULL);
		// $this->addRoute("tierra/doc", self::METHOD_GET, 4, 8);
	}

	private function matchMethods($req_method, $matchTo){
		return ($req_method & $matchTo) > 0;
	}

	function addRoute(
		$pattern
	,	$request_methods
	,	$controller
	,	$action
	){
		$this->routeMap[$pattern] = array(
			"methods" => $request_methods
		,	"controller" => $controller
		,	"action" => $action
		);
	}

	function match(){
		$request = new Request();
		$req_route = $request->getProperty("_route");
		$req_method = $request->getProperty("_method");

		$req_method_const = constant(get_class($this)."::METHOD_${req_method}");

		if($req_route[strlen($req_route)-1] == '/'){
			$req_route = substr($req_route, 0, strlen($req_route)-1);
		}

		foreach($this->routeMap as $pattern => $route){

			if( $this->matchMethods($req_method_const, $route["methods"]) ){

				if( preg_match("/^".str_replace("/", "\/", $pattern)."$/", $req_route) > 0 ){
					
					$ctrl_filename = CONTROLLER_DIR."/".$route["controller"] . ".php";
					$ctrl_actionname = $route["action"] . "Action";

					if(file_exists($ctrl_filename)){
						@require_once($ctrl_filename);
						if(class_exists($route["controller"])){
							$ctrl_refl = new ReflectionClass($route["controller"]);
							if(
								$ctrl_refl->isSubClassOf(self::$basicRouteController_refl) &&
								$ctrl_refl->hasMethod($ctrl_actionname)
							){
								$ctrl = $ctrl_refl->newInstance();

								$ctrl->beforeAction();
								$ctrl->$ctrl_actionname();
								$ctrl->afterAction();

								return;
							}else{
								$request->addFeedback("Controller class has wrong definition");
							}
						}else{
							$request->addFeedback("Controller definition not found");
						}
					}else{
						$request->addFeedback("Controller definition file does not exist");
					}

					break;
				}
			}
		}


	}
}
?>