<?php
	class WrongException extends Exception{
		function __construct(){
			echo "������������ ������ ������ WrongException<br>";
		}
		function message(){
			return "��������� ������ �����!";
		}
	}
?>