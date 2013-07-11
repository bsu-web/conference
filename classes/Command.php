<?php
require_once('Request.php');
abstract class Command{
	final function __construct(){
		
	}
	function execute(Request $request){
		$this->doExecute($request);
	}
	abstract function doExecute(Request $request);
}
?>