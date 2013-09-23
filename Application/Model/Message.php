<?php

namespace Application\Models;

/**
* @author Zalutskii
* @version 2.0 автор будет объектом 07.09.13
* Класс сообщений
*/

class Message extends \System\Orm\DomainObject{
	/**
	 * Автор сообщения
	 * Объект класса Account
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
	 * Дата отправки сообщения
	 */
	private $date;
	
	/**
	 * Задать автора
	 * @param \Application\Models\Account $author
	 */
	public function setAuthor(\Application\Models\Account $author){
		$this->author = $author;
		$this->markDirty();
	}
	/**
	 * Получить автора
	 * @return \Application\Models\Account
	 */
	public function getAuthor(){
		return $this->author;
	}
	/**
	 * Задать текст сообщения
	 * @param unknown $text
	 */
	public function setText($text){
		$this->text = $text;	
		$this->markDirty();
	}
	/**
	 * Получить текст сообщения
	 */
	public function getText(){
		return $this->text;
	}
	/**
	 * Задать прикрепленный файл 
	 * @param unknown $file
	 */
	public function setFile($file){
		$this->file = $file;
		$this->markDirty();
	}
	
	public function getFile(){
		return $this->file;
	}
	/**
	 * Установить дату отправки сообщения
	 * @param unknown $date
	 */
	public function setDate($date){
		$this->date = $date;
		$this->markDirty();
	}
	/**
	 * Получить дату отправки сообщения
	 */
	public function getDate(){
		return $this->date;
	}

	public function targetClass(){
		return 'Message';
	}
}
?>