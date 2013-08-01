<?php
function dirty(&$someVar = null){
	$someVar = 48;
}

$a = 4;
dirty($a);
dirty();

echo $a, PHP_EOL;