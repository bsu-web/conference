<?php
//���������� ������� ����� ��������

try{
	$moo=$_POST['moo'];
	if (!is_numeric($moo)){//�������� ����� ���� ���� ��������� ������
		$moo=null;
	}
	$DBH=new PDO("mysql:host=localhost;dbname=testbase","root","");
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$STH=$DBH->prepare("SELECT * FROM cows WHERE (:cowid IS NULL OR cow_id = :cowid)");
	$STH->bindValue(':cowid',$moo);	
	$STH->setFetchMode(PDO::FETCH_ASSOC);
	$STH->execute();
	while ($row=$STH->fetch()){
			echo "name=".$row['cow_name']."<br> color=".$row['cow_color']."<br> corral=".$row['corral_name'];
			echo "<hr>";
	}
}
catch(PDOException $e){
	echo "�������, � ��� ��������.";  
    echo $e->getMessage();
}
echo "<br>success!";
?>