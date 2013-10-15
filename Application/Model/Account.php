<?php

namespace Application\Model;

/**
* @author Zalutskii
* @version 1.0 07.09.13
* Класс аккаунта
*/

class Account extends \System\Orm\DomainObject{
	/**
	 * Имя
	 */
	private $name;
	/**
	 * Фамилия
	 */
	private $family;
	/**
	 * Задать имя
	 * @param string $name
	 */
	public function setName($name){
		$this->name = $name;
		$this->markDirty();
	}
	/**
	 * Получить имя
	 * @return string
	 */
	public function getName(){
		return $this->name;
	}
	/**
	 * Задать фамилию
	 * @param string $family
	 */
	public function setFamily($family){
		$this->family = $family;
		$this->markDirty();
	}
	/**
	 * Получить фамилию
	 * @return string
	 */
	public function getFamily(){
		return $this->family;
	}	
	public function targetClass(){
		return 'Account';
	}
}
?>