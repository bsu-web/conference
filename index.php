<?php

require_once 'Controller.php';

if(!defined("DS"))
	define("DS", DIRECTORY_SEPARATOR);

//define("ROOT", realpath(dirname(dirname(__FILE__))));
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
 
spl_autoload_register(array("Controller", "autoload"));

$controller = Controller::run();

?>
