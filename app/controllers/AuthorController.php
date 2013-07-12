<?php
class AuthorController extends Controller {
	public function Add(){
		$session = new Session("Authors");

		$name = $this->getParam("name");
		$family = $this->getParam("family");
		$patronym = $this->getParam("patronym");

		$author = new Author;
		$author->setName($name);
		$author->setFamily($family);
		$author->setPatronymic($patronym);

		$c = $session->get("authors");

		if(is_null($c)){
			$c = array();
		}
		array_push($c, $author);

		$session->set("authors", $c);
		$this->redirect("authors");
	}

	public function Index(){
		$session = new Session("Authors");

		$c = $session->get("authors");
		$this->assign("authors", $c);
		$this->render("Authors");

	}

	public function Drop(){
		$session = new Session("Authors");

		$c = $session->set("authors", null);
		$this->redirect("authors");
	}
}