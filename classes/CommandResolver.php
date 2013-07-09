<?php
/**
* Конвертер Request -> Command
**/
class CommandResolver {
	/**
	* Базовая команда
	* @var ReflectionClass
	**/
	private static $base_cmd_r;
	/**
	* Команда по умолчанию
	* @var Request
	**/
	private static $default_cmd;
	/**
	* Инициализируем статические поля (если надо)
	**/
	function __construct(){
		if( !self::$base_cmd_r ){
			self::$base_cmd_r = new ReflectionClass("Command");
			self::$default_cmd = new DefaultCommand();
		}
	}
	/**
	* Получение объекта Command, соответствующего данному Request
	* @param Request $request Заданный Request
	* @return Command Соответствующий Command (либо self::$default_cmd)
	**/
	function getCommand(Request $request){
		$cmd = $request->getProperty("cmd");
		if(!$cmd){
			return self::$default_cmd;
		}
		$sep = DIRECTORY_SEPARATOR;

		$cmd = str_replace( array('.', $sep), "", $cmd );
		$classname = $cmd."Command"; // в случае использования пространств имён -- исправить
		$filepath = COMMAND_DIR.$sep.$cmd.".php";

		if(file_exists($filepath)){
			@require_once( $filepath );
			if( class_exists($classname) ){
				$cmd_class_r = new ReflectionClass($classname);
				if($cmd_class_r->isSubClassOf(self::$base_cmd_r)){
					return $cmd_class_r->newInstance();
				}else{
					$request->addFeedback("class {$classname} is not a Command");
				}
			}
		}

		$request->addFeedback("command ${cmd} not found");
		return self::$default_cmd;
	}
}
?>