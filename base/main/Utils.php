<?php
/**
* Вспомогательные функции и константы
**/
class Utils {
	const METHOD_UNKNOWN 	= 0;
	const METHOD_GET 		= 1;
	const METHOD_POST 		= 2;
	const METHOD_OPTIONS 	= 4;
	const METHOD_HEAD 		= 8;
	const METHOD_PUT 		= 16;
	const METHOD_DELETE 	= 32;
	const METHOD_TRACE 		= 64;
	const METHOD_CONNECT 	= 128;

	// public static function errorHandler($errno, $errstr, $errfile, $errline){
	// 	echo "<pre>";
	// 	echo $errstr;
	// 	echo "</pre>";
	// }
}