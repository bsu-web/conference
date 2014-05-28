<?php
/**
 * Класс, представляющий окончательный ответ пользователю
 */
namespace System\Network;

class Response {
	/**
	* Конструктор
	**/
	public function __construct(){}

	/**
	* Выводит финальный текст
	* @param string $str Текст для вывода
	* @return void
	**/
	public function write($str){
		header("Content-Type: text/html; charset=utf-8");

		echo $str;
	}

	/**
	* Назначает статус http-ответа
	* @param int $statusCode Http-код ответа
	* @return void
	**/
	public function setStatus($statusCode){
		if(is_int($statusCode) || is_string($statusCode)){
			header(' ', true, $statusCode);
		}
	}

	/**
	* Перенаправляет на указанный url
	* @param string $url Целевой url
	* @param int $status Статус http-ответа
	* @return void
	**/
	public function setRedirection($url, $status = 302){
		if(is_string($url)){
			$this->setStatus($status);
			header("Location: ${url}");
		}
	}

	/**
	* Устанавливает параметры кэширования
	* @param bool $to Кэшировать или нет
	* @return void
	**/
	public function setCaching($enabled=true){
		if(!$enabled){
			// cache off
			header("Cache-Control: no-cache, must-revalidate");
			header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		}else{
			// cache on
			header("Cache-Control:");
			header("Expires:");
		}
	}
}
