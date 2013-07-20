<?php

//require_once 'ApplicationHelper.php';
//require_once 'ApplicationRegistry.php';
require_once 'Controller.php';

//$app_reg = ApplicationRegistry::instance();
//$req_reg = RequestRegistry::instance();

/*
$app_h = ApplicationHelper::instance();
$app_h->init();*/

if(!defined("DS"))
	define("DS", DIRECTORY_SEPARATOR);

define("ROOT", realpath(dirname(dirname(__FILE__))).DS);

spl_autoload_register(array("Controller", "autoload"));

$controller = Controller::run();

?>
