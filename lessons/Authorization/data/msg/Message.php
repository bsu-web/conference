<?php

require_once('DomainObject.php');

/**
* @author Zalutskii
* @version 1.0  
* Класс сообщений
*/

class Message extends DomainObject{
	/**
	 * Автор сообщения
	 */
	private $author;
	/**
	 * Текст сообщения
	 */
	private $text;
	/**
	 * Прикрепленный файл
	 */
	private $file;
	/**
	 * Дата отправки
	 */
	private $date;
	
	/**
	 * Установка автора
	 */
	public function setAuthor($auth){
		$this->author = $auth;		
	}
	
	public function getAuthor(){
		return $this->author;
	}
	
	public function setText($txt){
		$this->text = $txt;	
	}
	
	public function getText(){
		return $this->text;
	}
	
	public function setFile($fil){
		$this->file = $fil;
	}
	
	public function getFile(){
		return $this->file;
	}
	
	public function setDate($dat){
		$this->date = $dat;
	}
	
	public function getDate(){
		return $this->date;
	}
	/**
	* Отправка сообщения
	*/	
	public function SendMessage(){
		echo ('Сообщение автора: '.$this->author.'<br> '.'Получатели : ');
		foreach ($this->recipient as $rec)
			echo ($rec.', ');	
		echo ('<br>Текст : '.$this->text.'<br>Файлы : <br><hr>');	
	}
	//Тестовый метод
	public function MPrint(){
		echo ('Сообщение автора: '.$this->author.'<br>Текст : '.$this->text.'<br>Файл : '.$this->getFile().'<br> Дата : '.$this->getDate().'<hr>');
	}

	public function targetClass(){
		return 'Message';
	}
}

?>