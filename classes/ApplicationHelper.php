<?php
require_once('ApplicationRegistry.php');
class ApplicationHelper{
	private static $instance;
	private $config="files/config.xml";
	
	private function __construct(){
		
	}
	static function instance(){
		if (!self::$instance){
			self::$instance=new self();
		}
		return self::$instance;
	}
	function init(){
		$dsn=ApplicationRegistry::getDSN();
		if (!is_null($dsn)){
			return;
		}
		$this->getOptions();
	}
	private function getOptions(){
		$this->ensure(file_exists($this->config),"File Not Found");
		$options=@SimpleXml_load_file($this->config);
		print get_class($options);
		$dsn=(string)$options->dsn;
		$this->ensure($options instanceof SimpleXMLElement, "File is Corrupted");
		$this->ensure($dsn,"DSN not found");
		ApplicationRegistry::setDSN($dsn);
		
	}
	private function ensure($expr,$message){
		if(!$expr){
			throw new Exception($message);
		}
	}
	
}
?>