<?php
class DefaultCommand extends Command {
	function doExecute(Request $request){
		foreach($request->getFeedback() as $feedback){
			echo "Debug: ${feedback}<br />";
		}
		echo "Debug: DefaultCommand::doExecute()<br />";
	}
}
?>