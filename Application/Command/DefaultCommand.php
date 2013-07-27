<?php
namespace Application\Command;

class DefaultCommand extends \System\Core\Command {
	protected function _doExecute(){
		//return array("forward"=>"StockCommand");
		// return array("redirect"=> "dokaku");
		return array("view"=>array("params"=>array("i"=>42)));
	}
}