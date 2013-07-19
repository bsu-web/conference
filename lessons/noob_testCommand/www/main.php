<?php
require_once( "ViewHelper.php" );
$request =VH::getRequest();
echo "header<br><hr>";
print array_pop($request->getFeedback());
echo "<br><hr>";
echo "footer<br>";
?>