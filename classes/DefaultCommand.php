<?php
require_once('Command.php');

class DefaultCommand extends Command{
	function doExecute(Request $request){
		$request->addFeedback("Welcome in WOO");
		include("../main.php");
	}
}
?>