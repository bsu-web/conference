<?php

require_once('Author.php');
require_once('AuthorMapper.php');

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
			print_r("������ ����������� � ���� ������:".$e->getMessage());
		}
        
$author= new Author;
$author->setName('��������');
$author->setFamily('�������');
$author->setPatronymic('�����������');
$str= $author->getName().' '.$author->getFamily().'</br>';
$mapper= new AuthorMapper($DBH);
$mapper->insert($author);

$author2= $mapper->find($author->getId());
echo $author2->getId().' '.$author->getName().'</br>';
$author2->setName('�����');
$mapper->update($author);
echo $author2->getId().' '.$author2->getName().'</br>';			
echo $author->getCount();
?>