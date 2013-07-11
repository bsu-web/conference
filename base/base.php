<?php
require_once "main".SLASH."App.php";

spl_autoload_register(array("App", "autoload"));

App::init();
$msg = new Message;
?>