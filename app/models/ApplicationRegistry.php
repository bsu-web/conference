<?php
require_once('Registry.php');

class ApplicationRegistry extends Registry{
	private static $instance;
	private $freezedir = "DATA";
	private $values = array();
	private $mtimes = array();
	
	private function __construct(){}
	
	static function instance(){
		if (! isset(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	protected function get($key){
		$path = $this->freezedir.DIRECTORY_SEPARATOR.$key;
		if(file_exists($path)){
			clearstatcache();
			$mtime=filemtime($path);
			if (!isset($this->mtimes[$key])){
				$this->mtimes[$key] = 0;
			}
			if ($mtime > $this->mtimes[$key]){
				$data = file_get_contents($path);
				$this->mtimes[$key]=$mtime;
				return ($this->values[$key]=unserialize($data));
			}
		}
		if (isset($this->values[$key])){
			return $this->values[$key];
		}
		return null;
	}
	
	protected function set($key, $val){
		$this->values[$key] = $val;
		$path = $this->freezedir.DIRECTORY_SEPARATOR.$key;
		file_put_contents($path, serialize($val));
		$this->mtime[$key]=time();
	}
	
	static function getDSN(){
		return self::instance()->get('dsn');
	}
	
	static function setDSN($dsn){
		return self::instance()->set('dsn', $dsn);
	}
}

?>