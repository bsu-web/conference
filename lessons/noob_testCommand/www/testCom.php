<?php
require_once('Command.php');
require_once('Author.php');
require_once('AuthorMapper.php');
require_once('Mapper.php');

class testCom extends Command{
	public function doExecute(Request $request){
		$author=new AuthorMapper();
		$author1=$author->find(2);
		$request->setProperty('obj',$author1); //
		return self::statuses('CMD_OK');
		
	}
}

?>