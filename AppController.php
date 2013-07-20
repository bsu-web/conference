<?php
require_once 'Request.php';
require_once 'ControllerMap.php';
require_once 'AppException.php';
require_once 'DefaultCommand.php';
//require_once '';
class AppController {
	private static $base_cmd;
	private static $default_cmd;
	private $controllerMap;
	private $invoked = array();
	
	public function __construct(ControllerMap $map){
		$this->controllerMap = $map;
		if (!self::$base_cmd) {
			self::$base_cmd = new ReflectionClass("Command");
			self::$default_cmd = new DefaultCommand();
			ApplicationRegistry::$appController = $this;
		}
	}	
	
	public function getView(Request $req){
		$view = $this->getResourse($req, "View");
		return $view;
	}
	
	function getForward(Request $req){
		$forward = $this->getResourse($req, "Forward");
		if ($forward){
			$req->setProperty('cmd', $forward);
		}
		return $forward;
	}
	
	private function getResourse(Request $req, $res){
		$cmd_str = $req->getProperty('cmd');
		$previous = $req->getLastCommand();
		$status = $previous->getStatus();
		if (!$status) {
			$status = 0;
		}
		$acquire = "get$res";
		
		$resourse = $this->controllerMap->$acquire($cmd_str, $status);
		
		if (!$resourse){
			$resourse = $this->controllerMap->$acquire($cmd_str, 0);
		}
		
		if (!$resourse) {
			$resourse = $this->controllerMap->$acquire('default', $status);
		}
		
		if (!$resourse){
			$resourse = $this->controllerMap->$acquire('default', 0);
		}
		
		return $resourse;
	}
	
	public function getCommand(Request $req){
		$previous = $req->getLastCommand();
		if (!$previous) {
			$cmd = $req->getProperty('cmd');
			if (!$cmd) {
				$req->setProperty('cmd', 'default');
				return self::$default_cmd;
			}
		}else{
			$cmd = $this->getForward($req);
			if (!$cmd){
				return null;
			}
		}
		$cmd_obj = $this->resolveCommand($cmd);
		if (!$cmd_obj) {
			throw new AppException("Команда '$cmd' не найдена");
		}
		$cmd_class = get_class($cmd_obj);
		if (isset($this->invoked[$cmd_class])) {
			throw new AppException("Циклический вызов");
		}
		$this->invoked[$cmd_class]=1;
		return $cmd_obj;
	}
	
	public function resolveCommand($cmd){
		$classroot = $this->controllerMap->getClassroot($cmd);
		//$filepath = "/command/$classroot.php";
		$filepath = "$classroot.php";
		//$classname = "\\command\\$classroot";
		$classname = "$classroot";
		if (file_exists($filepath)) {
			require_once "$filepath";
			if (class_exists($classname)) {
				$cmd_class = new ReflectionClass($classname);
				if ($cmd_class->isSubclassOf((self::$base_cmd))) {
					return $cmd_class->newInstance();
				}
			}
		}
		return null;
	}
}

?>