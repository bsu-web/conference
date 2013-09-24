<?php
namespace Auth;
use System\Core\Command;
/** 
 * @author user
 * 
 */

require_once 'FilterChain.php';

class FilterManager {
	public $filterChain; 
	
	public function __construct(){
		$this->filterChain = FilterChain::instance();
	}
	
	//базовые фильтры
	public function check(Command $cmd){
		$filter = new ACFilter($this->filterChain);
		return $this->filterChain->check($cmd);
	}
	
	public function ClientCheck(FilterChain $chain){
		//возможно будут клиентские фильтры
	}
	
}

?>