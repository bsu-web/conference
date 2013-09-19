<?php

require_once('MessageCollection.php');
require_once('Message.php');

/**
 * @author Zalutskii
 * @version 1.0
 * ����� ������ ���������
 */

class MessageGroup extends DomainObject{
	/**
	 * ��������� ������
	 */
	private $title;
	/**
	 * ����� ������
	 */
	private $author;
	/**
	 * ��������� ������
	 */
	private $partners;
	/**
	 * ��������� ������
	 */
	private $messages;
	
	public function __construct(){
		$this->messages = new MessageCollection();
	}	
	/**
	 * ������ ��������� ������
	 * @param $title ��������
	 */
	public function setTitle($tit){
		$this->title = $tit;
	}	
	/**
	 * ������ ��������� ������
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
	 * ������ ������ ���������
	 * @param $Messages ������ ���������
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
	
	//�������� �����
	public function MGPrint(){
		echo ('Id : '.parent::getId().'<br>�������� : '.$this->getTitle().'<br>����� : '.$this->getAuthor().'<br>��������� : ');
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