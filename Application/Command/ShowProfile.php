<?php
namespace Application\Command;

class ShowProfile extends \System\Core\Command {
	public function exec(){
		return $this->render(
			array("uid" => $this->data["uid"])
		);
	}
}