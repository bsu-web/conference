<?php
namespace System\Core;

abstract class Command {
	protected $data;
	abstract protected function _doExecute();

	public function doExecute(){
		return $this->_doExecute();
	}

	final public function __construct($data){
		$this->data = $data;
	}
}