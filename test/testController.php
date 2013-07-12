<?php
require_once('../classes/Controller.php');
require_once('../classes/Author.php');
$avtor1 = new Author();
$avtor1->setName('Alexsandr');
$avtor1->setFamily('Makedonov');
$avtor1->setPatronymic('Nicolaevich');
$avtor1->setId(1);
$_REQUEST['cmd']='testView';
$_REQUEST['author']=$avtor1;


$control = Controller::run();
?>