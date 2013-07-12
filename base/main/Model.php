<?php
abstract class Model {
	protected static $_pdo;
	public $dbTable = null;

	function __construct(){
		if(!isset(self::$_pdo)){
			//$_pdo = new PDO(
			//	// App::$Registry::getDsn(),
			//	// App::$Registry::getDbUser(),
			//	// App::$Registry::getDbPassword()
			//	"mysql:dbname=conference;host=127.0.0.1",
			//	"root",
			//	"iamthebest"
			//);
		}
		$this->dbTable = strtolower(get_class($this));
	}

	function find(){

	}

	function load(){

	}

	function save(){
		
	}
}