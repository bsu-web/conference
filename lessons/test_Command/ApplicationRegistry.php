<?php

require_once 'Registry.php';
require_once 'ControllerMap.php';
require_once 'AppController.php';
/** 
 * @author user
 * 
 */
class ApplicationRegistry extends Registry{
	private static $instance;
	private $freezedir = "data";
	private $values = array();
	private $mtimes = array();
	public static $appController;
	
	private function __construct() { }

	public static function instance(){
		if (!isset(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	protected function get($key){
		/*$path = $this->freezedir.DIRECTORY_SEPARATOR.$key;
		if (file_exists($path)){
		ï	clearstatcache();
			$mtime = filemtime($path);
			if (!isset($this->mtimes[$key])) {
				$this->mtimes[$key] = 0;
			}
			if ($mtime > $this->mtim[$key]) {
				$data = file_get_contents($path);
				$this->mtimes[$key] = $mtime;
				return ($this->values[$key] = unserialize($data));
			}
		}
		
		if (isset($this->values[$key])) {
			return $this->values[$key];
		}*/
		
		if(isset($this->values[$key])){
			return $this->values[$key];	
		}
		
		return null;
	}
	
	protected function set($key, $val){
		/*$this->values[$key] = $val;
		$path = $this->freezedir.DIRECTORY_SEPARATOR.$key;
		file_put_contents($path, serialize($val));
		$this->mtimes[$key]=time();*/
		$this->values[$key] = $val;
	}
	
	public static function getDSN(){
		return self::instance()->get('dsn');
	}
	
	public static function setDSN($dsn){
		return self::instance()->set('dsn', $dsn);
	}
	
	public static function setControllerMap(ControllerMap $map){
		return self::instance()->set('controllerMap', $map);
	}
	
	public static function getControllerMap(){
		return self::instance()->get('controllerMap');
	}
	
	public static function appController(){
		return new AppController(self::getControllerMap());
	}
	
}

?>