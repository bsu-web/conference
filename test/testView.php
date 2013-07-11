<?php
require_once('Author.php');
class testView extends Command{
	function doExecute(Request $request){
		$avtor=$request->getProperty("author");		
		$request->addFeedback("Avtor name ".$avtor->getName()."<br> family ".$avtor->getFamily());
		include("../main.php");
	}
}
?>