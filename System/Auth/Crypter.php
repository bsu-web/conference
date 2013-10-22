<?php
namespace System\Auth;

class Crypter {
	private $default_salt = "axqfHJAgtH!#&%";

	public function __construct(){
	}

	public function crypt($pass, $salt = null){
		if (!$salt) {
			$salt = $this->default_salt;
		}
		$result_pass = md5(md5($pass).md5($salt));
		return $result_pass;
	}
}

?>
