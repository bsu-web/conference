<?php
	class WrongException extends Exception{
		function __construct(){
			echo "—генерирован объект класса WrongException<br>";
		}
		function message(){
			return "ќшибочный формат файла!";
		}
	}
?>