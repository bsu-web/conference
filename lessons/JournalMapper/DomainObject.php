<?php
require_once('ObjectWather.php');
require_once('HelperFactory.php');
abstract class DomainObject{ //����������� ����� ��� ����(!) ��������
    private $id;
    
	function getId(){ //��������� id �������
		return $this->id;
	}
    
	function setId($id){ //������� id �������
		$this->id=$id;
	}
    
    static function getCollection($type){
        return HelperFactory::getCollection($type);
    }
    
    function collection(){
        return self::getCollection(get_class($this));
    }
}
?>