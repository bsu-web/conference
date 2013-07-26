<?php
namespace System\Core;

use System\Network\Request;
use System\Network\Response;
use System\Core\Application;

use System\Core\Dispatcher;
use System\Config\Reader\XML as XMLConfig;

/**
 * 
 * @author nekjine
 */
class FrontController {
	public function __construct(){
		$xml = new XMLConfig();
		$config = $xml->readFromFile(APP.DS."Config".DS."config.xml");
		Application::instance()->config = $config;
	}

	public function handle(){
		
		$dispatcher = new Dispatcher(new Request, new Response);
		$dispatcher->dispatch();
	}
}