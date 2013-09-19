<?php

namespace Auth;
use System\Core\Command;
use auth\Group;
/** 
 * @author user
 * 
 */
abstract class Filter {
	private $status;
	
	public function __construct(FilterChain $chain){
		$chain->attach($this);
	}
	
	public abstract function check(Command $cmd, Group $group = NULL);
}

?>