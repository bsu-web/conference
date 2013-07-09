<?php
/**
* Выводит сообщение "Hello World"
**/
class helloworldCommand extends Command {
	protected function doExecute(Request $request){
		echo "<h1>Hello World!</h1>";
	}
}
?>