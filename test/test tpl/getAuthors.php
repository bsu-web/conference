<?php
require_once('Command.php');
require_once('Author.php');
require_once('AuthorMapper.php');
require_once('Mapper.php');

class getAuthors extends Command{
	public function doExecute(Request $request){
		$DBH=new PDO("mysql:host=localhost;dbname=test","root","");
		$DBH->prepare("set character_set_client='cp1251'")->execute();
		$DBH->prepare("set character_set_results='cp1251'")->execute();
		$DBH->prepare("set collation_connection='cp1251_general_ci'")->execute();
		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$STH=$DBH->prepare("SELECT * FROM author");
		$STH->execute();
		
		$count=0;
		while ($arr=$STH->fetch()){
			$count++;
			$object=new Author();
			$object->setName($arr[1]);
			$object->setFamily($arr[2]);
			$object->setPatronymic($arr[3]);
			$object->setId($arr[0]);			
			$request->setProperty('obj'.$count,$object); 
		}
		$request->setProperty('count',$count); 
		return self::statuses('CMD_OK');		
	}
}

?>