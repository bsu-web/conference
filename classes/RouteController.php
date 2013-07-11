<?php
/**
* Basic rule
**/
abstract class RouteController {
	function beforeAction(){}
	function afterAction(){}
	abstract function indexAction(Request $request);
}
?>