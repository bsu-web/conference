<?php

/** 
 * @author user
 * 
 */
require_once 'DomainObject.php';
class Author {
	private $name       =  "��� ������ ";
	private $family     =  "������� ������ ";
	private $patronymic =  "�������� ������ ";
	
	function setName($name){ 	 //������ ��� ������
		$this->name = $name;
	}
	function getName(){ 		 //�������� ��� ������
		return $this->name;
	}
	function setFamily($family){ //������ ������� ������
		$this->family = $family;
	}
	function getFamily(){        //�������� ������� ������
		return $this->family;
	}
	function setPatronymic($patronymic){	//������ �������� ������
		$this->patronymic = $patronymic;
	}
	function getPatronymic(){				//�������� �������� ������
		return $this->patronymic;
	}
	/*	function __construct($name, $family, $patronymic){
	 $this->name		  = $name;
	$this->family	  = $family;
	$this->patronymic = $patronymic;
	}	*/
}

?>