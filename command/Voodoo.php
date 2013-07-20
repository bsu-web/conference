<?php
require_once "Paper.php";
require_once "Author.php";

class Voodoo extends Command{
	public function doExecute(Request $request){
		$authors = new Authors;

		$a1 = new Author("abc", "xyz", "foo");
		$a1->setId("id0");
		$authors->insert($a1);

		$a2 = new Author("123", "234", "102");
		$a2->setId("id1");
		$authors->insert($a2);

		$a3 = new Author("aba", "234", "aida");
		$a3->setId("id2");
		$authors->insert($a3);

		$doc = new Paper;
		$doc->setAuthors($authors);
		$doc->setTitle("Test title");

		$request->setProperty("doc", $doc);
	}
}

?>