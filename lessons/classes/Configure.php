<?php
	require_once("DamagedException.php");
	require_once("FileException.php");
	require_once("WrongException.php");
	
	class Configure{
		private $file;
		function __construct($file){
			$this->file=$file;
			if (!file_exists($file)){//файла не существует
				throw new FileException();
			}
			
			$fp = fopen($file, "r");
			$mytext = fgets($fp, 999);
			switch ($mytext){
				case 1: //Повреждённый файл
					throw new DamagedException();break;
				case 2://Ошибка в форме файла
					throw new WrongException();break;	
			}
		}
	}
?>