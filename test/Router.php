<?php
/**
* Router test
*/

$router = new System\Routing\Router;
$p = $router->_getParams("/a/b/{di}/{cu}/{faid}/{123_bouffe2}");

assert( $p[0] == "di" );
assert( $p[1] == "cu" );
assert( $p[2] == "faid" );
assert( count($p) == 3 );

assert($router->_getParams("/dull{id}")[0] == "id");

$router->addRoute("/{id}/{str}/{uid}", "malaka", "view", array("id"=>"[0-9]{2}", "uid"=>"[0-9]{1,32}"));
assert(
	$router->match("/49/gumbojava/1324")["cmd"] == "malaka"
);
assert(
	$router->generateURL("malaka", array("id"=>"5", "uid"=>"123", "str"=>"jigga")) == "/5/jigga/123"
);

if(error_get_last() == null){
	echo ":) All tests okay\n";
}else{
	echo ":( Some tests failed\n";
}