<?php
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__FILE__)));
define("APP", ROOT.DS."Application");
define("SYS", ROOT.DS."System");

function autoload($class_ns_path){
	$path = ROOT .DS. str_replace("\\", DS, $class_ns_path) .".php";
	if(!is_readable($path)){
		trigger_error("Class file for ${path} does not exist or not readable", E_USER_ERROR);
	}
	require_once($path);
	if(!class_exists($class_ns_path)){
		trigger_error("Class ${class_ns_path} not found in the file where it should be", E_USER_ERROR);
	}
}

// function error_handler($errno, $errmsg, $file, $line, $vars=null){
// 	include(APP.DS."View".DS."default_error.php");
// 	return true;
// }

// function warning_handler($errno, $errmsg, $file, $line, $vars=null){

// }

// function exception_handler($exception){
// 	echo "Unhandled exception!";
// }


// function shutdown_func(){
// 	$last_error = error_get_last();
// 	if($last_error["type"] & E_ERROR > 0){
// 		echo "jeez";
// 		//error_handler($last_error["type"], $last_error["message"], $last_error["file"], $last_error["line"]);
// 	}
// 	echo "tumputun";
// }

spl_autoload_register("autoload");

//use System\Core\FrontController;
/*
$fc = new FrontController;
$fc->handle();
*/

$router = new System\Routing\Router;
/*
$router->setCommand("/dull{id}", "dull_command");
$router->setView("/dull{id}", "dull_view");
$router->setParamPattern("/dull{id}", "id", "[0-9]{2}");
$router->setParamPattern("qi_gon", "test", "[0-9]{2}4");

$router->setCommand("/a/{id}/{name}/{photo}/to", "smart_command");

assert( $router->getCommand("/dull{id}") == "dull_command" );
assert( $router->getView("/dull{id}") == "dull_view" );
assert( $router->getParamPattern("/dull{id}", "id") == "[0-9]{2}" );

assert( $router->getParamPattern("qi_gon", "test") == "[0-9]{2}4" );
assert( $router->getParamPattern("qi_gon", "twao") == null );
assert( $router->getParamPattern("/dull{id}", "missed") == null );

assert( $router->getCommand("n0th1ng") == null );
assert( $router->getView("taz") == null );
*/
$p = $router->_getParams("/a/b/{di}/{cu}/{faid}/{123_bouffe2}");

assert( $p[0] == "di" );
assert( $p[1] == "cu" );
assert( $p[2] == "faid" );
assert( count($p) == 3 );

assert($router->_getParams("/dull{id}")[0] == "id");


// assert(
// 	$router->generateURL("dull_command", array("id" => "48")) == "/dull48"
// );
// assert(
// 	$router->generateURL("smart_command", array("name" => "Sam", "id"=>"32", "photo" => "nope")) == "/a/32/Sam/nope/to"
// );

$router->addRoute("/{id}/{str}/{uid}", "malaka", "view", array("id"=>"[0-9]{2}", "uid"=>"[0-9]{1,32}"));
var_dump(
	$router->match("/49/gumbojava/1324")
);
var_dump(
	$router->generateURL("malaka", array("id"=>"5", "uid"=>"123", "str"=>"jigga"))
);

echo $_SERVER["REQUEST_URI"];