<?php

require_once 'ApplicationHelper.php';
require_once 'ApplicationRegistry.php';
require_once 'Controller.php';

//$app_reg = ApplicationRegistry::instance();
//$req_reg = RequestRegistry::instance();

/*
$app_h = ApplicationHelper::instance();
$app_h->init();*/



$controller = Controller::run();

?>
