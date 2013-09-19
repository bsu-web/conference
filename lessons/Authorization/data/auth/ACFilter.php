<?php
namespace Auth;
use System\Core\Command;
use System\Session\Session;
use auth\Group;
use System\Core\Application;
/** 
 * @author user
 * 
 */
require_once 'Filter.php';

class ACFilter extends Filter{

	public function check(Command $cmd, Group $group = NULL){
		
		$acm = AccessManager::instance();
		$session = new Session();
		$user_id = $session->get('user_id');
		
		
		/*foreach ($cmd->data as $obj){
			$rul_obj = $amc->getRuleObj($user_id, $obj->get_id());
			if (!in_array($rul_obj, $rul_com)) {
				return false;
			} 	
		}*/
		if (!$group) {
			if($user_id){
				$user_role = "USER";
			}
			else {
				$user_role = "GUEST";
			}
			$r_map = RuleMap::instance();
			$group = $r_map->getGroup($user_role);
			print_r($group);
		}
		
		
		$cmd_name = get_class($cmd);
		$temp = explode("\\", $cmd_name);
		$cmd_name = end($temp);
		
		
		
		/*$app = Application::instance();
		$command = $app->getCommandByClass($cmd_name);
		$objType = $command["mainObj"];
		
		if ($objType) {
			foreach ($command->param as $param){
				if ($param["objId"]) {
					$param_name = (string)$param["name"];
				}
			}
			$group_id = $acm->getRuleObj($user_id, $obj_id, $obj_type);
			$group = $r_map->getGroup($group_name);				//что-то такое
		}*/
		
		
		
		//print_r($group);
	
		/*echo '<br>'.'user_role';
		print_r($user_role);
		echo '<br>';
		print_r($rule_com);
		echo '<br>';
		print_r($rule_com);
		
		
		foreach ($user_role as $ur){
			if(in_array($ur, $rule_com))
				return true;
		}
		
		
		return false;
		*/
		
		//return $group->isAllowed($cmd_name);
		return $acm->can($cmd_name, $group);
	}
}

?>