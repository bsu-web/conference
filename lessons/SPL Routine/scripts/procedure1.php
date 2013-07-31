<?php
	try{
		$DBH=new PDO("mysql:host=localhost;dbname=testbase","root","");
		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		//Показать все cow_name для всех записей
		$STH=$DBH->prepare("CALL show_all()");
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		while ($row=$STH->fetch()){
			echo "name=".$row['cow_name']."<br> color=".$row['cow_color']."<br> corral=".$row['corral_name'];
			echo "<hr>";
		}
	}
	catch (PDOException $e){
		echo "MISTAKE";
	}
	echo "<br>OK";
?>