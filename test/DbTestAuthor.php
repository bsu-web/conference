<?php

require_once('../app/models/Author.php');
require_once('../app/models/AuthorMapper.php');

$dblogin='root';
$dbpassword='';
try{
			$DBH=new PDO("mysql:host=localhost;dbname=test",$dblogin,$dbpassword);
			$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$DBH->prepare("set character_set_client='cp1251'")->execute();
			$DBH->prepare("set character_set_results='cp1251'")->execute();
			$DBH->prepare("set collation_connection='cp1251_general_ci'")->execute();
		}
catch (PDOException $e){
			print_r("Ошибка подключения к базе данных:".$e->getMessage());
		}
        
$author= new Author;
$author->setName('Светлана');
$author->setFamily('Нагаева');
$author->setPatronymic('Геннадьевна');
$str= $author->getName().' '.$author->getFamily().'</br>';
$mapper= new AuthorMapper($DBH);
//$mapper->insert($author);

//$author= $mapper->find($author->getId());
//$author->setName('Мария');
//$mapper->update($author);			

?>