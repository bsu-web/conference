<?php
/**
* Класс Представления
**/
class View {
	/**
	* Объект класса Smarty, использующийся для рендеринга шаблонов
	* @var Smarty
	**/
	protected $_smarty = null;

	/**
	* Конструктор
	**/
	public function __construct(){
		if($this->_smarty == null){
			$this->_smarty = App::getSmarty();
		}
	}

	/**
	* Назначает параметр к шаблону
	* @param string $key Имя параметра
	* @param mixed $value Значение параметра
	* @return void
	**/
	public function assign($key, $value){
		$this->_smarty->assign($key, $value);
	}

	/**
	* Рендерит представление
	* @param string $template_name Имя шаблона (без расширения, без дополнительных путей)
	* @return string Результат рендеринга
	**/
	public function render($template_name){
		return $this->_smarty->fetch(APP.DS."views".DS.$template_name.".tpl");
	}
}