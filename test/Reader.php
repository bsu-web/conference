<?php
$r = new System\Config\Reader\XML;

var_dump(
	count( $r->readFromFile(APP.DS."Config".DS."config.xml")->routemap->route )
);
