<?php
return array(
	"/counter" => array(
		"method" => Utils::METHOD_GET
	,	"controller" => "CounterController"
	,	"action" => "View"
	),
	"/counter_reset" => array(
		"method" => Utils::METHOD_GET
	,	"controller" => "CounterController"
	,	"action" => "Clear"
	),
	"/authors" => array(
		"method" => Utils::METHOD_GET
	,	"controller" => "AuthorController"
	,	"action" => "Index"
	),
	"/authors_add" => array(
		"method" => Utils::METHOD_POST
	,	"controller" => "AuthorController"
	,	"action" => "Add"
	)

);