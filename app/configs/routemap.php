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
	)
);