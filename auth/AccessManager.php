<?php
namespace Auth;

use System\Core\Application;
use System\Core\Command;
use auth\RuleMap;
use PDO;
use auth\Group;
use System\Session\Session;
/** 
 * @author user
 * 
 */
class AccessManager {
	private static $instance;
	
	private static $rules = array('USER'			  => 1, 
								  'GUEST'    		  => 2, 
								  'TEST'         => 3, 
									);
	
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
			//print_r($group);
			//echo "<br>";
			$name = (string)$group["name"];
			//print_r($name);
			//echo "<br>";
			$parent = (string)$group["parent"];
			
			if (!$parent) {
				$parent = "root";
			}
			$obj = new Group($parent);
			$obj->setName($name);
			$obj->setParent($parent);
			foreach ($group->allow->command as $cmd){
				$obj->Allow((string)$cmd["class"]);
			}
			$r_map->addRule($obj);
			//print_r($obj);
			//echo "<br>";
		}
		//print_r($r_map);
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
	 	//print_r($rules);
		
	 	/*if($rule['id'] = ''){
	 		return self::$rules['NO']; //не уверен как сейчас
	 	}*/
	 	/*if (!isset($rule['rule_id'])) {
	 		return "NO";
	 	}*/
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
		//print_r($cmd_name);
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
		$r = $group->isAllowed($cmd);
		$parent_group_name = $group->getParent();
		
		if ($r) {
			return $r;
		}
		
		if ($parent_group_name === "root"){
			return $r;
		}
		
		$r_map = RuleMap::instance();
		$parent_group = $r_map->getGroup($parent_group_name);
		return $this->can($cmd, $parent_group);
	}
	
	public function check(Command $cmd, $obj_id, $obj_type){
		$r_map = RuleMap::instance();
		$session = new Session();
		$user_id = $session->get("user_id");
		
		//echo "<br>user_id: ";
		//print_r($user_id);
		
		if ($obj_id) {
			if ($user_id) {
				$obj_rule = $this->getRuleObj($user_id, $obj_id, $obj_type);
				
				//echo "<br>obj_rule: ";
				//print_r($obj_rule);
				
				if ($obj_rule) {
					$group = $r_map->getGroup($obj_rule);
				}	
				else {
					$group = $r_map->getGroup("GUEST");
				}	
			}			
		}
		else {
			if ($user_id) {
				$group = $r_map->getGroup("USER");
			}
			else {
				$group = $r_map->getGroup("GUEST");
			}
		}
		
		//echo "<br>group: ";
		//print_r($group);
		
		$cmd_name = get_class($cmd);
		$temp = explode("\\", $cmd_name);
		$cmd_name = end($temp);
		
		
		return $this->can($cmd_name, $group);
	}
	
}

?>