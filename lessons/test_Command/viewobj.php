<?php

/** 
 * @author user
 * 
 */
require_once 'Command.php';
require_once 'Author.php';
class viewobj extends Command{
	public function doExecute(Request $request){
		$author = $request->getProperty('obj');
		$request->addFeedback("Выводим свойства объекта");
	}
}

?>