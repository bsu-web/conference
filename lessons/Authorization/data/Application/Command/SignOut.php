<?php

namespace Application\Command;

use Auth\Login;
/**
 *
 * @author user
 *        
 */
class SignOut extends \System\Core\Command{
	public function exec(){
		$login = new Login();
		$login->SignOut();
		return $this->forward("DefaultCommand", '');
	}
}

?>