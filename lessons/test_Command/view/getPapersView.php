<?php
/**
*@author j1o1

*/
require_once("ViewHelper.php" );
require_once("RequestRegistry.php" );
require_once("Paper.php" );
require_once("Author.php" );
require_once("AuthorMapper.php" );
require_once("AuthorCollection.php" );

$reg = RequestRegistry::instance();
$req = $reg->getRequest();

$count=$req->getProperty('count');
echo "<h3><b>Полный список <u>статей</u> из тестовой БД:</b></h3><hr>";
For ($i=1;$i<=$count;$i++){
	$r=$req->getProperty('obj'.$i);
	echo "<div style=\"margin-left:50px\"><b>".$r->getId().") ".$r->getTitle()."</b><br>".$r->getContent()."<br><br><u>Список авторов:</u><br>";
	echo $r->getAuthorStr();
	echo "</div><hr>";
}
?>