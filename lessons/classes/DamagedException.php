<?php
	class DamagedException extends Exception{
		function __construct(){
			echo "������������ ������ ������ DamagedException<br>";
		}
		function message(){
			return "���� ��������!";
		}
	}
?>