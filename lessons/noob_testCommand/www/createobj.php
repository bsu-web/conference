<?php

/** 
 * @author user
 * 
 */
require_once 'Command.php';
require_once 'Author.php';
class createobj extends Command{
	public function doExecute(Request $request){
		$author = new Author();
		$request->setProperty('obj', $author);
		$request->addFeedback("Создан объект Author");
		return self::statuses('CMD_OK');
	}
}

?>