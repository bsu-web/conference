<?php
class testView extends Command{
	function doExecute(Request $request){
		$avtor=$request->getProperty("author");		
		//$way=$request->getProperty("family");
		$request->addFeedback("Avtor name ".$avtor->getName()."<br> family=".$avtor->getFamily());
		include("../main.php");
	}
}
?>