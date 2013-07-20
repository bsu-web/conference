<?php
require_once "Paper.php";
require_once "Author.php";
require_once "AuthorCollection.php";

class Voodoo extends Command{
	public function doExecute(Request $request){
		$DBH=new PDO("mysql:host=localhost;dbname=test","root","");
		$DBH->prepare("set character_set_client='cp1251'")->execute();
		$DBH->prepare("set character_set_results='cp1251'")->execute();
		$DBH->prepare("set collation_connection='cp1251_general_ci'")->execute();
		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$STH=$DBH->prepare("SELECT * FROM author");
		$STH->execute();
		
		$collection=new AuthorCollection;
		
		$count=0;
		while ($arr=$STH->fetch()){
			$count++;
			$object=new Author();
			$object->setName($arr[1]);
			$object->setFamily($arr[2]);
			$object->setPatronymic($arr[3]);
			$object->setId($arr[0]);			
		//	$request->setProperty('obj'.$count,$object); 
			$collection->add($object);
			//print_r($collection);
		}
		
		$request->setProperty('doc',$collection); 
		$request->setProperty('count',$count); 
		return self::statuses('CMD_OK');		
	}				
	/*
		
		$authors = new Authors;

		$a1 = new Author("abc", "xyz", "foo");
		$a1->setId("id0");
		$authors->insert($a1);

		$a2 = new Author("123", "234", "102");
		$a2->setId("id1");
		$authors->insert($a2);

		$a3 = new Author("aba", "234", "aida");
		$a3->setId("id2");
		$authors->insert($a3);

		$doc = new Paper;
		$doc->setAuthors($authors);
		$doc->setTitle("Test title");

		$request->setProperty("doc", $doc);
	}
	*/
}

?>