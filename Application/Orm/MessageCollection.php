<?php

namespace Application\Orm;

class MessageCollection extends \System\Orm\Collection{
	function targetClass(){
		return "Message";
	}
}

?>