<?php
require_once('../classes/Authors.php');
require_once('../classes/Author.php');
require_once('../classes/Paper.php');

$avtor1 = new Author();
$avtor1->setName('Alexsandr');
$avtor1->setFamily('Makedonov');
$avtor1->setPatronymic('Nicolaevich');
$avtor1->setId(1);

$avtor2 = new Author();
$avtor2->setName('Sergey');
$avtor2->setFamily('Nekgin');
$avtor2->setPatronymic('Petrovich');
$avtor2->setId(2);

$avtor3 = new Author();
$avtor3->setName('Irina');
$avtor3->setFamily('Abageeva');
$avtor3->setPatronymic('Yurevna');
$avtor3->setId(3);

$authors1 = new Authors();
$authors1->insert($avtor1);
$authors1->insert($avtor2);

$authors2= new Authors();
$authors2->insert($avtor3);

$paper1 = new Paper();
$paper1->setTitle('Статья');
$paper1->setAuthors($authors1);
echo $paper1->getString().'</br>';

$paper2= new Paper();
$paper2->setTitle('Статьюшка');
$paper2->setAuthors($authors2);
echo $paper2->getString().'</br>';

?>