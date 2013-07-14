<?php
	require_once("classes/Runner.php");
	//проверяем ошибку "неверный файл"
	echo "Проверяем ошибку: Не существует файла<br>";
	Runner::init("files/file.txt");
	echo "<br><hr>";
	//проверяем ошибку "повреждённый файл"
	echo "Проверяем ошибку: Повреждённый файл<br>";
	Runner::init("files/file1.txt");
	echo "<br><hr>";
	//проверяем ошибку "неправильный формат файла"
	echo "Проверяем ошибку: Неправильный формат файла<br>";
	Runner::init("files/file2.txt");
	echo "<br><hr>";
	//проверяем работу в нормальной ситуации
	echo "Всё нормально ошибок нет<br>";
	Runner::init("files/file3.txt");
	echo "<br><hr>";	
?>