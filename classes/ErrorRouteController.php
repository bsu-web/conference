<?php
class ErrorRouteController extends RouteController {
	function indexAction(Request $request){
		echo "<h1>Engine error</h1><pre>";
		$fs = $request->getFeedbackString();
		echo $fs;
		echo "</pre>";
	}
}
?>