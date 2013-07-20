<?php
/**
*@author j1o1

*/
require_once("ViewHelper.php" );
require_once("RequestRegistry.php" );
require_once("Author.php" );
require_once("AuthorMapper.php" );

$reg = RequestRegistry::instance();
$req = $reg->getRequest();

$count=$req->getProperty('count');
echo "<h3><b>Полный список <u>авторов</u> из тестовой БД:</b></h3>";
For ($i=1;$i<=$count;$i++){
	$r=$req->getProperty('obj'.$i);
	echo $r->getId().") ".$r->getName()." ".$r->getFamily()." ".$r->getPatronymic()."<br>";
}
?>