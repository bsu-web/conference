<?php
	class FileException extends Exception{
		function __construct(){
			echo "������������ ������ ������ FileException<br>";
		}
		function message(){
			return "�� ���������� ������ �����!";
		}
	}
?>