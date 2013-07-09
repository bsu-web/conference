<?php
	class FileException extends Exception{
		function __construct(){
			echo "Сгенерирован объект класса FileException<br>";
		}
		function message(){
			return "Не существует такого файла!";
		}
	}
?>