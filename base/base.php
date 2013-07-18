<?php
/**
* Выполняется в самом начале
**/
if(!defined("DS"))
define("DS", DIRECTORY_SEPARATOR);
/**
* Абсолютный путь ко всей папке проекта
**/
define("ROOT", realpath(dirname(dirname(__FILE__))));
/**
* Путь к ядру
**/
define("BASE", ROOT.DS."base");
/**
* Путь к приложению (конференции)
**/
define("APP", ROOT.DS."app" );

require_once ROOT.DS."vendor".DS."autoload.php";
require_once BASE.DS."base.php";
require_once "main".DS."App.php";

/**
* Назначаем автозагружатель классов
**/
spl_autoload_register(array("App", "autoload"));

$full_req_uri = $_SERVER["REQUEST_URI"];
$upper_junk = dirname($_SERVER["REQUEST_URI"]);
if(strlen($upper_junk) > 1){
	define("REQUEST_URI_FULL",
		str_replace(
			$upper_junk,
			"",
			$full_req_uri
		)
	);
}else{
	define("REQUEST_URI_FULL", $full_req_uri);
}

/**
* Получение чистой строки запроса, без параметров
**/
$qm_pos = strpos(REQUEST_URI_FULL, "?");

if($qm_pos !== false ){
	define("REQUEST_URI", substr(REQUEST_URI_FULL, 0, $qm_pos));
}else{
	define("REQUEST_URI", REQUEST_URI_FULL);
}

define("REQUEST_METHOD", constant("Utils::METHOD_".$_SERVER["REQUEST_METHOD"]));
/**
* Запускаем всё и вся
**/
$bootstrapper = new Bootstrapper;
$bootstrapper->boot(new Request);
?>