<?php
$app = \System\Core\Application::instance();

$app->loadConfig(APP.DS."Config".DS."config.xml");

//var_dump($app->getRouteById("route_default"));
//var_dump($app->getCommandById("cmd_show_user_by_alias"));
//var_dump($app->getFilterById("filter_test"));
//var_dump($app->getViewById("view_default"));