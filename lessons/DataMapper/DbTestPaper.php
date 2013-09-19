<?php

require_once('Paper.php');
require_once('paperMapper.php');

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
        
$paper= new Paper;
$paper->setTitle('Ангелы');
$paper->setContent('Ангелы смертны');
$array=array('Иванов','Сидоров');
$paper->setAuthors($array);
$str= $paper->getTitle().' '.$paper->getConent().'</br>';
$mapper= new paperMapper($DBH);
$mapper->insert($paper);

$paper= $mapper->find($paper->getId());
echo $paper->getId().' '.$paper->getTitle().'</br>';
$paper->setTitle('Евнухи');
$mapper->update($paper);
echo $paper->getId().' '.$paper->getTitle().'</br>';			

?>