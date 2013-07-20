<?php
require_once('Command.php');
require_once('Author.php');
require_once('AuthorMapper.php');
require_once('Mapper.php');

class testCom extends Command{
	public function doExecute(Request $request){
		
		return self::statuses('CMD_OK');
		
	}
}

?>