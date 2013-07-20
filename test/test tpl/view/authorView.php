<?php
require_once("ViewHelper.php" );
require_once("RequestRegistry.php" );

$reg = RequestRegistry::instance();
$req = $reg->getRequest();

$r=$req->getProperty('obj');
echo $r->getFamily()."<br>";
print_r($r);
?>