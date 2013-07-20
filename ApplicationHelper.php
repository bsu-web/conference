<?php

require_once 'ControllerMap.php';
require_once 'ApplicationRegistry.php';
require_once 'Command.php';
require_once 'AppException.php';

class ApplicationHelper {
	private static $instance;
	private $config = "./config/default.xml";
	
	private function __construct() {}
	
	public static function instance(){
		if(!self::$instance){
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function init(){
		//$dsn = ApplicationRegistry::getDSN();
		//if(!is_null($dsn)){
		//	return;
		//}
		//
		$this->getOptions();
	}
	
	private function getOptions(){
		$this->ensure(file_exists($this->config), "Файл конфигурации не найден");
		$options = simplexml_load_file($this->config);

		//$dsn = (string)$options->dsn;
		$this->ensure($options instanceof SimpleXMLElement, "Файл конфигурации запорчен");
		//$this->ensure($dsn, "DSN не найден");
		//ApplicationRegistry::setDSN($dsn);
		
		$map = new ControllerMap();
		foreach ($options->control->view as $default_view){
			$stat_str = trim($default_view['status']);
			$status = Command::statuses($stat_str);
			$map->addView('default', $status, (string)$default_view);
		}
		
		foreach ($options->control->command as $command){
			$name = (string)$command['name'];

			if (isset($command['status'])) {
				$stat_str = trim($command['status']);
				$status = Command::statuses($stat_str);
			}
			else {
				$status = 0; 
			}
			
			if (isset($command->classroot)) {
				$classroot = trim((string)$command->classroot);
				}
			else {
				$classroot = $name; 
			}
			
			if (isset($command->view)) {
				$view = trim((string)$command->view);
				$map->addView($name, $status, $view);
			}
			
			foreach ($command->status as $stat){
				$stat_str = trim((string)$stat['value']);
				$status = Command::statuses($stat_str);
				if (isset($stat->forward)){
					$forward = (string)$stat->forward;
					$map->addForward($name, $status, $forward);
				}
				
			}
			
			$map->addClassroot($name, $classroot);
		}
		
		ApplicationRegistry::setControllerMap($map);
		
		
	}
	
	private function ensure($expr, $message){
		if (!$expr) {
			throw new AppException($message);
		}
	}
	
}

?>