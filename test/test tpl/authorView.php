<?php
require_once('Command.php');

class authorView extends Command{
	public function doExecute(Request $request){
		$author=new AuthorMapper();
		$author1=$author->find(4);
		$request->setProperty('obj',$author1); 
		return self::statuses('CMD_OK');
	}
}
?>