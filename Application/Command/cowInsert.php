<?php
namespace Application\Command;

class cowInsert extends \System\Core\Command {
	protected function exec(){
            $name=$this->req->__get('name');
            $color=$this->req->__get('color');
            $corral=$this->req->__get('corral_id');
            $pdo=\System\Core\DbConn::getPDO();
            $pdo->prepare("set character_set_client='cp1251'")->execute();
	    $pdo->prepare("set character_set_results='cp1251'")->execute();
	    $pdo->prepare("set collation_connection='cp1251_general_ci'")->execute();
            $STH=$pdo->prepare("CALL insert_cow(:cowname,:cowcolor,:corral)");
	    $STH->bindValue(':cowname',iconv('utf-8', 'cp1251',$name));
	    $STH->bindValue(':cowcolor',iconv('utf-8', 'cp1251',$color));
	    $STH->bindValue(':corral',iconv('utf-8', 'cp1251',$corral));			
	    $STH->execute();
            
            return $this->render(
			array("name" => $name,"color" => $color,"corral" => $corral)
		);
	}
}
?>