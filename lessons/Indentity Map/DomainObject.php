<?php
require_once('ObjectWather.php');
abstract class DomainObject{ //����������� ����� ��� ����(!) ��������
    private $id;
    
	function getId(){ //��������� id �������
		return $this->id;
	}
    
	function setId($id){ //������� id �������
		$this->id=$id;
	}
}
?>