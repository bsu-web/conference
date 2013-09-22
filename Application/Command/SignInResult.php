<?php
namespace Application\Command;


use System\Session\Session;
use Auth\Login;


class SignInResult extends \System\Core\Command{
	public function exec(){
		$auth = new Login();
		$auth->SignIn($this->req->login, $this->req->pass);
		$session = new Session();
		return $this->render(
			array("result" => $session->get('user_id')));
	}
}
