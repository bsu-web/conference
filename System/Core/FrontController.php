<?php
namespace System\Core;

use System\Network\Request;
use System\Network\Response;

use System\Core\Dispatcher;

/**
 * 
 * @author nekjine
 */
class FrontController {
	public function handle(){
		$dispatcher = new Dispatcher(new Request, new Response);
		$dispatcher->dispatch();
	}
}