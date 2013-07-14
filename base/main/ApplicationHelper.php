<?php
/**
*Класс для работы с конфигурационными данными
**/
class ApplicationHelper {
	/**
	*Переменная 
	*@var 
	**/
	protected static $config;
	private static $instance;
	
	/**
	* Конструктор
	**/
	private function __construct(){}
	
	public static function instance(){
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	* Возвращает значение переменной конфигурации
	* @param string $key Имя переменной
	* @return string Значение переменной
	**/
	public static function getConfig($key){
		if(!isset(self::$config[$key])){
			return null;
		}
		return self::$config[$key];
	}
	/**
	* Устанавливает значение переменной конфигурации
	* @param string $key Имя переменной
	* @param string $value Новое значение переменной
	**/
	protected static function setConfig($key, $value){
		self::$config[$key] = $value;
	}
	/**
	* Загружает в переменную $config либо возвращает
	* @param string $cfgFile Имя конфигурационного файла
	* @param bool $notHere параметр true->возвращает значения/false->устанавливает через setConfig
	**/	
	public static function loadConfig($cfgFile, $notHere=false){
		$cfg = include(APP.SLASH."configs".SLASH.$cfgFile.".php");
		if(!is_null($cfg) && is_array($cfg)){
			if($notHere){
				return $cfg;
			}else{
				foreach($cfg as $key=>$value){
					self::setConfig($key, $value);
				}
			}
		}
	}
	
}
?>