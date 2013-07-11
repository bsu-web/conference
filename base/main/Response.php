<?php
/**
* Класс для отдачи конечного текста клиенту
**/
class Response {
	/**
	* Были ли посланы заголовки http-ответа, если были, то дальнейший вывод невозможен
	* @var bool
	**/
	protected $headers_sent = false;

	/**
	* Конструктор (пустой)
	**/
	public function __construct(){}

	/**
	* Выводит финальный текст
	* @param string $str Текст для вывода
	* @return void
	**/
	public function write($str){
		header("Content-Type: text/html; charset=utf-8");

		if(!$this->headers_sent){
			echo $str;
			$this->headers_sent = true;
		}
	}

	/**
	* Назначает статус http-ответа
	* @param int $statusCode Http-код ответа
	* @return void
	**/
	public function setStatus($statusCode){
		if(is_int($statusCode) || is_string($statusCode)){
			//$this->headers
			header(' ', true, $statusCode);
		}
	}

	/**
	* Перенаправляет на указанный url
	* @param string $url Целевой url
	* @return void
	**/
	public function setRedirection($url){
		if(is_string($url)){
			header("Location: ${url}");
			$this->headers_sent = true;
		}
	}

	/**
	* Устанавливает параметры кэширования
	* @param bool $to Кэшировать или нет
	* @return void
	**/
	public function setCaching($to=true){
		if(!$to){
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