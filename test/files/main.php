<?php
require_once( "../classes/RequestRegistry.php" );
$request =RequestRegistry::getRequest();
echo "header<br><hr>";
print array_pop($request->getFeedback());
echo "<br><hr>";
echo "footer<br>";
?>