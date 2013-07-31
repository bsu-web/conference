<?php
	try{
		$DBH=new PDO("mysql:host=localhost;dbname=testbase","root","");
		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		//передача параметра в процедуру
		$STH=$DBH->prepare("CALL show_cow(:cowid)");
		$STH->bindValue(':cowid',1);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		while ($row=$STH->fetch()){
			echo "name=".$row['cow_name']."<br> color=".$row['cow_color']."<br> corral=".$row['corral_name'];
			echo "<hr>";
		}
		//Вставка в БД
		if ($_GET['insert']==1){
			$STH=$DBH->prepare("CALL insert_cow(:cowname,:cowcolor,:corral)");
			$STH->bindValue(':cowname','Дварт');
			$STH->bindValue(':cowcolor','Коричневый');
			$STH->bindValue(':corral',3);			
			$STH->execute();
		}
		//Процедура с условным оператором
		echo "<b>show cow 2!!!</b><br>";
		$STH=$DBH->prepare("CALL show_cow2(:cowid)");
		$STH->bindValue(':cowid',0);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		while ($row=$STH->fetch()){
			echo "name=".$row['cow_name']."<br> color=".$row['cow_color']."<br> corral=".$row['corral_name'];
			echo "<hr>";
		}
	}
	catch (PDOException $e){
		echo $e->getMessage();
	}
	echo "<br>OK";
?>