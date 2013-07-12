<?php
class feed extends Command{
	function doExecute(Request $request){
		$say=$request->getProperty("say");		
		$way=$request->getProperty("way");
		$request->addFeedback("FEEDBACK PAGE ".$say."<br> DIRECTION=".$way);
		include("files/main.php");
	}
}
?>