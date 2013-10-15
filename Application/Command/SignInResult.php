<?php
namespace Application\Command;


use System\Session\Session;
use System\Auth\Login;


class SignInResult extends \System\Core\Command{
	public function exec(){
		$auth = new Login();
		$result = $auth->SignIn($this->req["login"], $this->req["pass"]);
		return $this->render(
			array("result" => $result));
	}
}
