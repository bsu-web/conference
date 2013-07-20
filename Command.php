<?php

/** 
 * @author user
 * 
 */
abstract class Command {
	private static $STATUS_STRINGS = array(
		'CMD_DEFAULT' 			=> 0
	,	'CMD_OK' 				=> 1
	,	'CMD_ERROR' 			=> 2
	,	'CMD_INSUFFICIENT_DATA' => 3
	);
	
	private $status = 0;
	
	public final function __construct() {}
	
	public function execute(Request $request){
		$this->status = $this->doExecute($request);
		$request->setLastCommand($this);
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public static function statuses($str='CMD_DEFAULT'){
		if (empty($str)){
			$str = 'CMD_DEFAULT';
		}
		return self::$STATUS_STRINGS[$str];
	}
	
	public abstract function doExecute(Request $request);
}

?>