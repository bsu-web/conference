<?php
/**
* Абстрактный класс Command
**/

abstract class Command {
	/**
	* Ни одному потомку конструктор не потребуется
	**/
	final function __construct(){}
	/**
	* Действие команды, вызывается непосредственно извне
	**/
	function execute(Request $request) {
		$this->doExecute($request);
	}
	/**
	* Действие команды, переопределяется в потомках
	**/
	protected abstract function doExecute(Request $request);
}
?>