<?php
	try{
		$DBH=new PDO("mysql:host=localhost;dbname=testbase","root","");
		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$start=4;
		$quant=5;
		//Цикл While
		if ($_GET['insert']==1){
			$STH=$DBH->prepare("CALL insert_corrals(:start,:quant)");
			$STH->bindValue(':start',$start);
			$STH->bindValue(':quant',$quant);			
			$STH->execute();
		}
	
	}
	catch (PDOException $e){
		echo $e->getMessage();
	}
	echo "<br>OK";
?>