<?php
use System\Routing\Route;

Route::setDefaultRegex("[a-z]");

$route = new Route("e0", "/{a}/{b}/{c}", "somecmd");

$route->addParamRegex("a", "[0-4a]{2}");
$route->addParamRegex("b", "[4-5b]{2}");

//print_r( $route->getCompiled() );
print_r( $route->generateURI(array("a"=>"0a", "b"=>"4b", "c"=>"a")) );
