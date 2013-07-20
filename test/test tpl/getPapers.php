<?php
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

		$count=0; //���������� ������
		while ($arr=$STH->fetch()){ //�� ���� paper'��
			$count++;

			$object=new Paper();
			$object->setTitle($arr[1]);
			$object->setContent($arr[2]);
			$object->setId($arr[0]);
			
			$STH1=$DBH->prepare("SELECT * FROM paper_authors WHERE paper_id=?");
			$STH1->execute(array($object->getId()));
			$authors=array();
			$authors=new AuthorCollection();
			$count1=0; //���������� ������� � ������ ������
			while ($arr1=$STH1->fetch()){ //�� ���� author'�� ������� paper'�, ��� �������� id ����� paper'�
				$count1++;

				$STH2=$DBH->prepare("SELECT * FROM author WHERE id=?");
				$STH2->execute(array($arr1[1]));
				$AuthorP=$STH2->fetch();
				
				$object1=new Author();
				$object1->setName($AuthorP[1]);
				$object1->setFamily($AuthorP[2]);
				$object1->setPatronymic($AuthorP[3]);
				$object1->setId($AuthorP[0]);

				$authors->add($object1);
			}
			$object->setAuthors($authors);
			$request->setProperty('obj'.$count,$object);
		}
		$request->setProperty('count',$count);
		return self::statuses('CMD_OK');
	}
}
?>