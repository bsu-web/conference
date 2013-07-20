<?php

/** 
 * @author user
 * 
 */
class dcom extends Command{
	
	public function doExecute(Request $request){
		echo 123124124;
		return self::statuses('CMD_OK');
	}
}

?>