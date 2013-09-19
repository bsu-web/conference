<?php
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", str_replace("/", DS, dirname($_SERVER["SCRIPT_FILENAME"])));
define("APP", ROOT.DS."Application");
define("SYS", ROOT.DS."System");

require SYS.DS."Core".DS."Loader.php";

if(defined("STDIN")){
	$CLI = new System\Console\CLI;
	$CLI->main($argc, $argv);
	exit;
}


use System\Core\Dispatcher;
use System\Network\Request;
use System\Network\Response;

$dispatcher = new Dispatcher(new Request, new Response);
$dispatcher->dispatch();