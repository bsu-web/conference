<?php
require_once('Collection.php');
class Authors extends Collection{
	function getString(){
		$array=$this->getAll();
		$s="";
		foreach ($array as $vArray){
			$help=$vArray->getName();
			$s.=" ".$help;
			$help=$vArray->getFamily();
			$s.=" ".$help;
			$help=$vArray->getPatronymic();
			$s.=" ".$help;
			$s.=", ";
		}
		return $s;
	}
}
?>
