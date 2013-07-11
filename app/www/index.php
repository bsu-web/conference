<?php
/**
* В идеале - выполняется первым - назначаем константы-пути и идём дальше
**/

/**
* Корневой URI путь
* TODO: не учитывает вложенность папки проекта в больше чем 1 папку
* TODO: переделать нахрен
**/
define("ROOT_URI", dirname(dirname(dirname($_SERVER["PHP_SELF"]))));

/**
* Абсолютный путь ко всей папке проекта
**/
define("ROOT", realpath("../../"));
/**
* Путь к ядру
**/
define("BASE", ROOT."/base");
/**
* Путь к приложению (конференции)
**/
define("APP", ROOT."/app" );
/**
* Разделитель путей ("\" в Windows и "/" в нормальных системах)
**/
define("SLASH", DIRECTORY_SEPARATOR);
/**
* Подключаем все необходимые библиотеки и идём дальше - в стартер ядра
**/
require_once ROOT."/vendor/autoload.php";
require_once BASE."/base.php";
?>