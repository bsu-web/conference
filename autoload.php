<?php
define("CLASS_DIR", __DIR__."/classes");
define("COMMAND_DIR", CLASS_DIR."/commands");

function autoloader($className){
	// echo "autoloader:: attempting to load $className<br />";
	include_once __DIR__."/classes/".$className.".php";
}

spl_autoload_register("autoloader");
?>