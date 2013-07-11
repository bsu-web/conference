<?php
class TestController extends Controller {
	public function index(){
		
	}
	
	public function PerformSmarty(){
		$this->assign("message", "hello world!");
		$this->render("test2");
	}
}