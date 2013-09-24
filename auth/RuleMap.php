<?php

namespace Auth;
use auth\Group;
use PDO;
/**
 *
 * @author user
 *        
 */
class RuleMap {
	private $rules = array();
	private static $instance;
	
	private function __construct(){}
	
	public static function instance(){
		if(!self::$instance){
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function addRule(Group $group){
		$this->rules[$group->getName()] = $group;
	}
	
	//кажется, уже не надо
	public function getRole($cmd){				
		//print_r($this->rules);
		//echo '<br>';
		//print_r($this->rules[$cmd]);
		return $this->rules[$cmd];
	}
	
	
	// возвращает объект
	public function getGroup($group_name){
		if (is_numeric($group_name)){
			try {
				$DBH = new PDO("mysql:host=localhost;dbname=auth", "root", '');
			}
				
			catch(PDOException $e) {
				echo $e->getMessage();
			}
			
			$group = $DBH->query("SELECT rule_name FROM rulemap WHERE rule_id = '$group_name'");
			$group_name = $group->fetch();
			//print_r($group_name);		
			
			$group_name = $group_name['rule_name'];
			//print_r($group_name);
		}
		//print_r($group_name);
		return $this->rules[$group_name];
	}
}

?>