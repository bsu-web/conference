<?php
/**
* Абстрактный класс Реестр
**/
abstract class Registry {
	/**
	* Получить значение ключа из реестра
	* @param string $key Имя ключа
	* @return mixed Значение ключа
	**/
	abstract public function get($key);
	/**
	* Установить значение ключа в реестре
	* @param string $key Имя ключа
	* @param mixed $val Значение ключа
	* @return void
	**/
	abstract public function set($key, $val);
}
?>
