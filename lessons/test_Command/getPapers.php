<?php
/**
*@author j1o1

*/
require_once('Command.php');
require_once('Paper.php');
require_once('Mapper.php');
require_once("Author.php" );
require_once("AuthorMapper.php" );
require_once("AuthorCollection.php" );

class getPapers extends Command{
	public function doExecute(Request $request){
		$DBH=new PDO("mysql:host=localhost;dbname=test","root","");
		$DBH->prepare("set character_set_client='cp1251'")->execute();
		$DBH->prepare("set character_set_results='cp1251'")->execute();
		$DBH->prepare("set collation_connection='cp1251_general_ci'")->execute();
		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$STH=$DBH->prepare("SELECT * FROM paper");
		$STH->execute();

		$count=0; //количество статей
		while ($arr=$STH->fetch()){ //по всем paper'ам
			$count++;
//			echo "<h3>статья #".$count."</h3>";
			$object=new Paper();
			$object->setTitle($arr[1]);
			$object->setContent($arr[2]);
			$object->setId($arr[0]);
			
			$STH1=$DBH->prepare("SELECT * FROM paper_authors WHERE paper_id=?");
			$STH1->execute(array($object->getId()));
			$authors=array();
			$authors=new AuthorCollection();
			$count1=0; //количество авторов в данной статье
			while ($arr1=$STH1->fetch()){ //по всем author'ам данного paper'а, при заданном id этого paper'а
				$count1++;
/*				echo $count1.") ";
				print_r($arr1);
				echo "<br><br>";
				
				echo "для данной статьи id автора: ".$arr1[1]."<br>";
*/				$STH2=$DBH->prepare("SELECT * FROM author WHERE id=?");
				$STH2->execute(array($arr1[1]));
				$AuthorP=$STH2->fetch();
				
				$object1=new Author();
				$object1->setName($AuthorP[1]);
				$object1->setFamily($AuthorP[2]);
				$object1->setPatronymic($AuthorP[3]);
				$object1->setId($AuthorP[0]);
/*				echo "new Author:<br>";
				print_r($object1);
				echo "<br><hr>";
*/				$authors->add($object1);
			}
			$object->setAuthors($authors);
			$request->setProperty('obj'.$count,$object);
			//$request->setProperty('obj_A'.$count,$authors);
			//$request->setProperty('count'.$count,$count1);
/*			echo "<b>АВТОРЫ:</b><br>";
			print_r($authors);
			echo "<br><hr><hr><hr>";
*/		}
		$request->setProperty('count',$count);
		return self::statuses('CMD_OK');
	}
}
?>