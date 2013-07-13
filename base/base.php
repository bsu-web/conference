<?php
/**
* Последний рубеж перед запуском
**/
require_once "main".SLASH."App.php";

/**
* Назначаем автозагружатель классов
**/
spl_autoload_register(array("App", "autoload"));

/**
* Получение чистой строки запроса, без параметров
**/
$qm_pos = strpos($_SERVER["REQUEST_URI"], "?");

if($qm_pos !== false ){
	$full_uri = substr($_SERVER["REQUEST_URI"], 0, $qm_pos);
}else{
	$full_uri = $_SERVER["REQUEST_URI"];
}

/**
* Если приложение не в корневой веб-папке, то удалим все лишние пути из REQUEST_URI
**/

define("REQUEST", substr($full_uri, strlen(ROOT_URI) == 1 ? 0 : strlen(ROOT_URI)));
define("REQUEST_METHOD", constant("Utils::METHOD_".$_SERVER["REQUEST_METHOD"]));

error_reporting(E_ALL);

/**
* Запускаем всё и вся
**/
$bootstrapper = new Bootstrapper;
$bootstrapper->boot(new Request);
?>