<?php
namespace \System\Utils;
/**
* Парсер для запросов вида /dir/conf/show_rediska
*/
class URIParser {
	public static function parse($full_req_uri = $_SERVER["REQUEST_URI"]){
		/*
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

		$qm_pos = strpos(REQUEST_URI_FULL, "?");

		if($qm_pos !== false ){
			define("REQUEST_URI", substr(REQUEST_URI_FULL, 0, $qm_pos));
		}else{
			define("REQUEST_URI", REQUEST_URI_FULL);
		}

		define("REQUEST_METHOD", constant("Utils::METHOD_".$_SERVER["REQUEST_METHOD"]));
		*/
	}
}