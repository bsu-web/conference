<?php
namespace System\Log;

class Logger {
	private static $lines = array();
	private static $prev_prefix = "";

	private function __construct(){

	}

	public static function log($str = ""){
		$d = debug_backtrace();

		$prefix = "";
		if(isset($d[1])){
			$prefix = $d[1]["class"].$d[1]["type"].$d[1]["function"] . "\n";
		}else{
			$prefix = basename($d[0]["file"]) . "\n";
		}
		if(self::$prev_prefix != $prefix){
			self::$lines[] = $prefix."->\t".$str."\n";
			self::$prev_prefix = $prefix;
		}else{
			self::$lines[] = "->\t".$str."\n";
		}
	}

	public static function out(){
		if(count(self::$lines) == 0){
			return;
		}
		echo "<pre>";
		foreach(self::$lines as $line){
			echo $line;
		}
		echo "</pre>";
	}
}