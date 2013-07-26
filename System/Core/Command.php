<?php
namespace System\Core;

abstract class Command {
	abstract protected function _doExecute();

	public function doExecute(){
		return $this->_doExecute();
	}
}