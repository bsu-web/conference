<?php
class CounterController extends Controller {
	public function Clear(){
		$session = new SessionRegistry("Counter");

		$session->set("counter", 0);
		$this->redirect("counter");
	}

	public function View(){
		$session = new SessionRegistry("Counter");

		$c = $session->get("counter");
		if(is_null($c)){
			$c = 0;
		}
		$c += 1;
		$session->set("counter", $c);

		$this->assign("message", "hello world!");
		$this->assign("hits", $c);

		$this->render("Counter");
	}
}