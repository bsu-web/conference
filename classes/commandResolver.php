<?php
require_once('DefaultCommand.php');

class commandResolver{
	private static $base_cmd;
	private static $default_cmd;
	function __construct(){
		if (!self::$base_cmd){
			self::$base_cmd=new ReflectionClass("Command");
			self::$default_cmd=new DefaultCommand();
		}
	}
	function getCommand(Request $request){
		$cmd=$request->getProperty('cmd');
		$sep=DIRECTORY_SEPARATOR;
		if(!$cmd){
			return self::$default_cmd;
		}		
		$cmd=str_replace(array('.',$sep),"",$cmd);
		$filepath="..{$sep}classes{$sep}{$cmd}.php";
		$classname=$cmd;
		if (file_exists($filepath)){
			@require_once("$filepath");			
			if (class_exists($classname)){
				$cmd_class=new ReflectionClass($classname);				
				if ($cmd_class->isSubClassOf(self::$base_cmd)){
					return $cmd_class->newInstance();
					
				}
				else{
					$request->addFeedback("Object not found");
				}
			}			
		}
		$request->addFeedback("Command not found");
		return clone self::$default_cmd;
		
	}
}
?>