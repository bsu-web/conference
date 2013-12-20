<?php

namespace Application\Orm;

class AccountUpdateFactory extends \System\Orm\UpdateFactory{
	function newUpdate(\System\Orm\DomainObject $obj){
		
  	  	$values["authorization_login"]=$obj->getLogin();
		$values["authorization_password"]=$obj->getPass();
		$values["authorization_salt"]=$obj->getSalt();

		if($obj->getId() > -1){
			return $this->buildStatement('update_authorization',$values);
		}

        	return $this->buildStatement('insert_authorization',$values, true);
    }
}
?>
