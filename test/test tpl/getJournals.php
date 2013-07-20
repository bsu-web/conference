<?php
require_once('Command.php');
require_once('Mapper.php');
require_once("Author.php" );
require_once("AuthorMapper.php" );
require_once("AuthorCollection.php" );
require_once("Paper.php" );
require_once("PaperMapper.php" );
require_once("PaperCollection.php" );
require_once("Journal.php" );
require_once("JournalMapper.php" );
require_once("JournalCollection.php" );

class getJournals extends Command{
	public function doExecute(Request $request){
		$DBH=new PDO("mysql:host=localhost;dbname=test","root","");
		$DBH->prepare("set character_set_client='cp1251'")->execute();
		$DBH->prepare("set character_set_results='cp1251'")->execute();
		$DBH->prepare("set collation_connection='cp1251_general_ci'")->execute();
		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
//*******************************************************************************************************
		$STH0=$DBH->prepare("SELECT * FROM journal");
		$STH0->execute();
		$journal_col=new JournalCollection;
		$count0=0;	
		while ($arr0=$STH0->fetch()){ //по всем journal'ам
			$count0++;
			
			$object0=new Journal();
			$object0->setTitle($arr0[1]);
			$object0->setId($arr0[0]);
			
		/*	echo "<br><b>new Journal:<br>";
			print_r($object0);
			echo "</b><br>";
		*/	
			$STH=$DBH->prepare("SELECT * FROM journal_paper WHERE journal_id=?");
			$STH->execute(array($object0->getId()));
			$authors0=array();
			$authors0=new PaperCollection();
			
			
//*******************************************************************************************************			
			//$STH0=$DBH->prepare("SELECT * FROM paper");
			//$STH0->execute();
		
			$count=0; //количество статей
			while ($arr=$STH->fetch()){ //по всем paper'ам
				$count++;
	
				$object=new Paper();
				$object->setTitle($arr[1]);
				$object->setContent($arr[2]);
				$object->setId($arr[0]);
				
			/*	echo "<br>new Paper:<br>";
				print_r($object);
				echo "<br><hr>";
			*/
				$STH1=$DBH->prepare("SELECT * FROM paper_authors WHERE paper_id=?");
				$STH1->execute(array($object->getId()));
				$authors=array();
				$authors=new AuthorCollection();
				$count1=0; //количество авторов в данной статье
				while ($arr1=$STH1->fetch()){ //по всем author'ам данного paper'а, при заданном id этого paper'а
					$count1++;
	
					$STH2=$DBH->prepare("SELECT * FROM author WHERE id=?");
					$STH2->execute(array($arr1[1]));
					$AuthorP=$STH2->fetch();
					
					$object1=new Author();
					$object1->setName($AuthorP[1]);
					$object1->setFamily($AuthorP[2]);
					$object1->setPatronymic($AuthorP[3]);
					$object1->setId($AuthorP[0]);
					
			/*		echo "<br>new Author:<br>";
					print_r($object1);
					echo "<br>";
			*/		
					$authors->add($object1);
				}
			//	echo "<hr><hr><hr>";
				$object->setAuthors($authors);
				$authors0->add($object0);
				//$request->setProperty('obj'.$count,$object);
			}
			$object0->setPapers($authors0);
			$journal_col->add($object0);
		}
		$request->setProperty('doc',$journal_col);
		$request->setProperty('count',$count0);
		return self::statuses('CMD_OK');
	}
}
?>