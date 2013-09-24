<?php
namespace Auth;
use System\Core\Command;
/** 
 * @author user
 * 
 */
class FilterChain {
	private $filters = array();
	private static $instance;
	
	private function __construct(){}
	
	public static function instance(){
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function attach(Filter $filter){
		$this->filters[] = $filter;
	}
	
	public function detach(Filter $filter){
		$newfilters = array();
		foreach ($this->filters as $arr){
			if ($arr != $filter) {
				$newfilters[] = $filter;
			}
		}
		$this->filters = $newfilters;
	}
	
	public function check(Command $cmd){
		$f = false;
		foreach ($this->filters as $filter){
			$f = $filter->check($cmd);
			if(!$f){
				return $f;
			}
		}
		return $f;
	}
}

?>