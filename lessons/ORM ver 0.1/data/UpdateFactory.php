<?php

abstract class UpdateFactory{
	abstract function newUpdate(DomainObject $obj);
	protected function buildStatement($table,array $fields,array $conditions=null,$link=false){
		$terms=array();
		if (!is_null($conditions)){
			$query="UPDATE {$table} SET ";
			$query.=implode("=?, ",array_keys($fields))."=?";
			$terms=array_values($fields);
			$cond=array();
			$query.=" WHERE ";
			foreach($conditions as $key=>$val){
				$cond[]="$key=?";
				$terms[]=$val;
			}
			$query.=implode(" AND ",$cond);
			
		}
		else{
			$query="INSERT INTO {$table} (";
			$query.=implode(",",array_keys($fields)).")";
			$query.=" VALUES (";
			foreach ($fields as $name=>$value){
				$terms[]=$value;
				$qs[]='?';
			}
			$query.=implode(",",$qs).")";			
		}
		return array($query,$terms,$link);
	}
    
    protected function buildLinks($table,array $fields){
        $query="INSERT INTO {$table} (";
		$query.=implode(",",$fields).")";
		$query.=" VALUES (";
		foreach ($fields as $field){
			$qs[]='?';
		}
		$query.=implode(",",$qs).")";   
        return $query; 
    }
}
?>