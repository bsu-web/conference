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
		$author->setName('���������');
		$author->setFamily('������');
		$author->setPatronymic('���������');
		$request->addFeedback("������ �������� �������");
		return self::statuses('CMD_OK');
	}
}

?>