<?php

require_once 'Command.php';
/** 
 * @author user
 * 
 */
class DefaultCommand extends Command {
	public function doExecute(Request $request){
		echo "Default Command call";
	}
}

?>