<?php
require_once('Collection.php');
class Journal extends Collection{ //����� "������ ����������"
	function getString(){ //������� ���������� ������, � ������� �������� ����� ������/�����������/�������
		$array=$this->getAll(); //��������� ������ ��������  �� ������������� ������
		$s="";
		foreach ($array as $vArray){ //+
			$help=$vArray->getTitle();
			$s.=" ".$help;				
			$help=$vArray->getAuthors()->getString();
			$s.=" ".$help;
			$s.="<br>";
		}
		return $s;
	}
}
?>
