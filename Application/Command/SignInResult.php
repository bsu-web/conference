<?php
namespace Application\Command;

use System\Session\Session;
use System\Auth\Login;
use System\Auth\DefaultGate;

class SignInResult extends \System\Core\Command{
	public function exec(){
		//$gate = new DefaultGate(); 
		$auth = Login::instance();
		$result = $auth->SignIn($this->req["login"], $this->req["pass"]);
		if($result == "OK"){
			$session = new Session();
			$user = $session->get("user");
			if(!($user->getName() && $user->getPatronymic() && $user->getFamily())){
				return $this->redirect("/profile/edit");
			}
		}
		return $this->render(
			array("result" => $result));
	}
}
?>
