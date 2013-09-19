<?php

require_once('MessageCollection.php');
require_once('Message.php');

/**
 * @author Zalutskii
 * @version 1.0
 * Класс группы сообщений
 */

class MessageGroup extends DomainObject{
	/**
	 * Заголовок группы
	 */
	private $title;
	/**
	 * Автор группы
	 */
	private $author;
	/**
	 * Участники группы
	 */
	private $partners;
	/**
	 * Сообщения группы
	 */
	private $messages;
	
	public function __construct(){
		$this->messages = new MessageCollection();
	}	
	/**
	 * Задаем заголовок группы
	 * @param $title заголвок
	 */
	public function setTitle($tit){
		$this->title = $tit;
	}	
	/**
	 * Выдаем заголовок группы
	 * @return string
	 */
	public function getTitle(){
		return $this->title;
	}

	public function setAuthor($auth){
		$this->author = $auth;		
	}
	
	public function getAuthor(){
		return $this->author;
	}
	
	public function setPartners($part){
		$this->partners = $part;
	}
	
	public function getPartners(){
		return $this->partners;
	}	
	/**
	 * задаем список сообщений
	 * @param $Messages Список сообщений
	 */
	function setMessages(MessageCollection $mes){
		$this->messsages= $mes;
	}
	
	function getMessages(){
		if (! isset($this->messages)){
			$this->messages= $this->getCollection($this->targetClass(),$this->getId());
		}
		return $this->messages;
	}
	
	function addMessage(Message $mes){
		$this->getMessages()->add($mes);
	}
	
	//Тестовый метод
	public function MGPrint(){
		echo ('Id : '.parent::getId().'<br>Название : '.$this->getTitle().'<br>Автор : '.$this->getAuthor().'<br>Участники : ');
		foreach($this->getPartners() as $par){
			echo ($par.',');
		}
		echo ('<hr>');
		foreach($this->getMessages() as $message){
			$message->MPrint();
		}
	}
}
?>