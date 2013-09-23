<?php

namespace Application\Model;

/**
 * @author Zalutskii
 * @version 10.09.13
 * Класс группы сообщений
 */

class MessageGroup extends \System\Orm\DomainObject{
	/**
	 * Заголовок группы
	 * @var unknown
	 */
	private $title;
	/**
	 * Описание группы
	 * @var unknown
	 */
	private $description;
	/**
	 * Автор группы
	 * @var unknown
	 */
	private $author;
	/**
	 * Участники группы
	 * @var unknown
	 */
	private $partners;
	/**
	 * Сообщения группы
	 * @var unknown
	 */
	private $messages;
	/**
	 * Задать заголовок группы
	 * @param unknown $title
	 */
	public function setTitle($title){
		$this->title = $title;
		$this->markDirty();
	}	
	/**
	 * Получить заголовок группы
	 */
	public function getTitle(){
		return $this->title;
	}
	/**
	 * задать описание группы
	 * @param unknown $description
	 */
	public function setDescription($description){
		$this->description = $description;
	}
	/**
	 * Получить описание группы
	 */
	public function getDescription(){
		return $this->description;
	}
	/**
	 * Задать автора
	 * @param Application\Models\Account $author
	 */
	public function setAuthor(\Application\Models\Account $author){
		$this->author = $author;		
		$this->markDirty();
	}
	/**
	 * Получить автора
	 * @return \Application\Models\unknown
	 */
	public function getAuthor(){
		return $this->author;
	}
	/**
	 * Установить участников группы
	 * @param Application\Orm\AccountCollection $partners
	 */
	public function setPartners(\Application\Orm\AccountCollection $partners){
		$this->partners = $partners;
		$this->markDirty();
	}
	/**
	 * Получить участников группы
	 * @return \Application\Models\unknown
	 */
	public function getPartners(){
		if (! isset($this->partners)){
			$this->partners = $this->getCollection($this->targetClass(), $this->getId());
		}
		return $this->partners;
	}	
	/**
	 * Задать список сообщений
	 * @param Application\Orm\MessageCollection $messages
	 */
	function setMessages(\Application\Orm\MessageCollection $messages){
		$this->messages= $messages;
		$this->markDirty();
	}
	/**
	 * Получить сообщения
	 * @return \Application\Models\MessageCollection
	 */
	function getMessages(){
		if (! isset($this->messages)){
			$this->messages = $this->getCollection($this->targetClass(),$this->getId());
		}
		return $this->messages;
	}
	/**
	 * Вставка сообщения
	 * @param Application\Models\Message $newmessage
	 */
	function addMessage(\Application\Models\Message $newmessage){
		$this->getMessages()->add($newmessage);
		$this->markDirty();
	}
	
	public function targetClass(){
		return 'MessageGroup';
	}
}	
?>