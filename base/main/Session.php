<?php
/**
* Класс для работы с сессией
**/
class Session extends Registry {
	/**
	* Префикс всех переменных данной сессии
	* @var string
	**/
	protected $prefix = null;

	/**
	* Конструктор
	* @param string $namespace Пространство имён (в нашем случае просто префикс) всех переменных данной сессиии
	**/
	public function __construct($namespace = "g"){
		if(!isset($_SESSION)){
			// TODO: warn || fatal ?
		}
		$this->prefix = $namespace . "_";
	}

	/**
	* Устанавливает значение переменной сессии
	* @param string $key Имя переменной
	* @param string $value Новое значение переменной
	**/
	public function set($key, $value){
		$_SESSION[$this->prefix . $key] = $value;
	}

	/**
	* Возвращает значение переменной сессии
	* @param string $key Имя переменной
	* @return string Значение переменной
	**/
	public function get($key){
		if(!isset($_SESSION[$this->prefix.$key])){
			return null;
		}
		return $_SESSION[$this->prefix . $key];
	}
}