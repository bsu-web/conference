<?php
	class DamagedException extends Exception{
		function __construct(){
			echo "—генерирован объект класса DamagedException<br>";
		}
		function message(){
			return "‘айл повреждЄн!";
		}
	}
?>