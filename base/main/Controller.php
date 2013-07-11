<?php
/**
* Базовый контроллер
**/
abstract class Controller {
	/**
	* Объект Request
	* @var Request
	**/
	protected $request;
	/**
	* Объект Response
	* @var Response
	**/
	protected $response;
	/**
	* Объект View, не инициализируется, пока не пригодится
	* @var View
	**/
	private $view = null;

	/**
	* Конструктор
	* @param Request $request Объект Request с данными запроса
	**/
	final public function __construct(Request $request){
		$this->request = $request;
		$this->response = new Response;
		//$this->view = new View;
	}

	/**
	* Получает внутренний объект View
	* Если некому action'у контроллера не нужно ничего выводить, то он просто не вызывает getView()
	* или функции, его использующие. Таким образом инициализация ненужных данных для View не 
	* происходит
	* @return View Новый объект View
	**/
	final protected function getView(){
		if(is_null($this->view)){
			$this->view = new View;
		}
		return $this->view;
	}

	/**
	* Обёртки
	**/

	/**
	* Получает значение параметра запроса
	* @param string $key Имя параметра запроса
	* @return string Значение параметра запроса
	**/
	final protected function getParam($key){
		return $this->request->getParam($key);
	}

	/**
	* Перенаправляет на указанную страницу
	* @param string $to Целевой url
	**/
	final protected function redirect($to){
		$this->response->setRedirection($to);
	}

	/**
	* Передаёт параметры в шаблон
	* @param string $key Ключ
	* @param mixed $value Значение
	* @return void
	**/
	final protected function assign($key, $value){
		$this->getView()->assign($key, $value);
	}

	/**
	* Выводит шаблон
	* @param string $tpl Имя шаблона
	* @return void
	**/
	final protected function render($tpl){
		$this->response->write($this->getView()->render($tpl));
	}
}