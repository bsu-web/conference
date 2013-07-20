<?php

/** 
 * @author user
 * 
 */
require_once 'Command.php';
require_once 'Author.php';
class changeobj extends Command{
	public function doExecute(Request $request){
		$author = $request->getProperty('obj');
		$author->setName('Александр');
		$author->setFamily('Пушкин');
		$author->setPatronymic('Сергеевич');
		$request->addFeedback("Заданы свойства объекту");
		return self::statuses('CMD_OK');
	}
}

?>