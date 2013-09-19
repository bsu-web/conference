<?php

require_once('DomainObject.php');

/**
* @author Zalutskii
* @version 1.0  
* ����� ���������
*/

class Message extends DomainObject{
	/**
	 * ����� ���������
	 */
	private $author;
	/**
	 * ����� ���������
	 */
	private $text;
	/**
	 * ������������� ����
	 */
	private $file;
	/**
	 * ���� ��������
	 */
	private $date;
	
	/**
	 * ��������� ������
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
	* �������� ���������
	*/	
	public function SendMessage(){
		echo ('��������� ������: '.$this->author.'<br> '.'���������� : ');
		foreach ($this->recipient as $rec)
			echo ($rec.', ');	
		echo ('<br>����� : '.$this->text.'<br>����� : <br><hr>');	
	}
	//�������� �����
	public function MPrint(){
		echo ('��������� ������: '.$this->author.'<br>����� : '.$this->text.'<br>���� : '.$this->getFile().'<br> ���� : '.$this->getDate().'<hr>');
	}

	public function targetClass(){
		return 'Message';
	}
}

?>