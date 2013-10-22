<?php
namespace System\Auth;

use System\Core\Application;
use System\Core\Command;
use System\Auth\RuleMap;
use PDO;
use System\Auth\Group;
use System\Session\Session;
/** 
 * @author user
 * 
 */
class AccessManager {
	private static $instance;	
	
	public static function instance(){
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	private function __construct(){
		//инициализация, чтение из конфига
		$app = Application::instance();
		$config = $app->getData("rules");
		$r_map = RuleMap::instance();
		foreach ($config->group as $group){
			$name = (string)$group["name"];
			$parent = (string)$group["parent"];
			
			if (!$parent) {
				$parent = null;
			}
			$obj = new Group($parent);
			$obj->setName($name);
			$obj->setParent($parent);
			
			$allow = $group->allow->command;
			$deny = $group->deny->command;
			
			if ($allow) {
				foreach ($group->allow->command as $cmd){
					$obj->Allow((string)$cmd["class"]);
				}
			}			
			
			if ($deny) {
				foreach ($group->deny->command as $cmd){
						$obj->Deny((string)$cmd["class"]);
					}
			}
			
				
			$r_map->addRule($obj);
		}
	}
	
	
	//получение прав на объект из БД
	//отдаст id группы
	public function getRuleObj($user_id, $obj_id, $obj_type){
		try {
			$DBH = new PDO("mysql:host=localhost;dbname=test", "root", '');
		}
			
		catch(PDOException $e) {
			echo $e->getMessage();
		}
			
		$rules = $DBH->query("SELECT rule_id FROM rules WHERE user_id = '$user_id' AND obj_id = '$obj_id' AND obj_type = '$obj_type'");
		$rule = $rules->fetch();
		
		//$rule_name = $DBH->query("SELECT rule_name FROM rulemap WHERE rule_id = ")

	 	return $rule['rule_id'];
	}
	
	//установка прав
	public function SetRuleObj($user_id, $obj_id, $rule, $obj_type){
		try {
			$DBH = new PDO("mysql:host=localhost;dbname=test", "root", '');
		}
			
		catch(PDOException $e) {
			echo $e->getMessage();
		}

		$rule_id = self::$rules[$rule];
		
		$rules = $DBH->query("INSERT INTO rules VALUES ('$user_id', '$obj_id', '$rule_id', '$obj_type') ");
		$rule = $rules->fetch();
	}
	
	//получение прав на команду из RuleMap
	//вроде бы уже не нужно
	public function getRuleCom(Command $cmd){
		$r_map = RuleMap::instance();
		
		$cmd_name = get_class($cmd);
		$temp = explode("\\", $cmd_name);
		$cmd_name = end($temp);

		return $r_map->getRole($cmd_name);
	}
	
	
	//соберем из RuleMap (кажется, все же из БД) 
	public function getGroup($user_id){
		//сходил в БД, взял имя группы
		//$group_name = "USER"; //пока так, потом поправлю
		$r_map = RuleMap::instance();
		return $r_map->getGroup($group_name);
	}
	
	//проверка присутствия $cmd в списке разрешений $group
	public function can($cmd, Group $group){
		$allow = $group->isAllowed($cmd);
		$deny = $group->isDenied($cmd);
		$parent_group_name = $group->getParent();
		
		if (!$parent_group_name) {
			return ($allow)&&(!$deny) ;
		}
		
		if ($deny) {
			return false;
		}
		
		if ($allow) {
			return true;
		}
		
		$r_map = RuleMap::instance();
		$parent_group = $r_map->getGroup($parent_group_name);
		return $this->can($cmd, $parent_group);
	}
	
	public function check(Command $cmd){
		$r_map = RuleMap::instance();
		$session = new Session();
		$acc = $session->get("acc");

		$objType = NULL;
		$obj_id = NULL;
		$app = Application::instance();
		
		$cmd_name = get_class($cmd);
		$temp = explode("\\", $cmd_name);
		$cmd_name = end($temp);
		
		$command = $app->getCommandByClass($cmd_name);
		
		$objType = (string)$command["mainObj"];

		$group = array();

		if ($objType) {

			foreach ($command->param as $param){
				if ($param["objId"]) {
					$param_name = (string)$param["name"];
					$obj_id = $cmd->getData($param_name);
				}
			}
			
			if ($acc) {
				$obj_rule = $this->getRuleObj($acc->getId(), $obj_id, $objType);
				if ($obj_rule) {
					//$group[] = $r_map->getGroup($obj_rule);
					$group[] = $obj_rule;
				}	
				else {
					return false; 
				}	
			}
		}
		else{
			if($acc){
				$group = $acc->getGroupList();
			}
			else{
				$group[] = "GUEST";
			}
		}
		
			
		

		$cmd_name = get_class($cmd);
		$temp = explode("\\", $cmd_name);
		$cmd_name = end($temp);

		foreach($group as $g){
			$r = $this->can($cmd_name, $r_map->getGroup($g));
			if($r){
				return $r;
			}
		}
		return false;
	}
	
}

?>
