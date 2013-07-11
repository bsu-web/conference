<?php
/**
* Defining root dir
**/
define("ROOT", dirname(dirname(dirname($_SERVER["PHP_SELF"]))));
define("BASE", realpath("../../base") );
define("APP", dirname(dirname($_SERVER["PHP_SELF"])));
define("SLASH", DIRECTORY_SEPARATOR);

/**
* Acquiring pure uri
* Removing QUERY_STRING chunk
**/
$qm_pos = strpos($_SERVER["REQUEST_URI"], "?");

if($qm_pos !== false ){
	$full_uri = substr($_SERVER["REQUEST_URI"], 0, $qm_pos);
}else{
	$full_uri = $_SERVER["REQUEST_URI"];
}

/**
* If app is not in a very root dir, remove this dir from REQUEST_URI
**/
define("CLEAN_REQUEST", substr($full_uri, strlen(ROOT) == 1 ? 0 : strlen(ROOT)));

/**
* Bootstrapping our app
**/
require_once BASE."/base.php";
?>