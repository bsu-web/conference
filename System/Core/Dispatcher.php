<?php
namespace System\Core;

use System\Network\Request;
use System\Network\Response;

use System\Routing\Router;

/**
 * @author nekjine
 */
class Dispatcher {
	protected $req;
	protected $res;

	public function __construct($req, $res){

	}

	public function dispatch(){
		$cm = new Router;

	}
}