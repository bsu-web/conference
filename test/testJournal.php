<?php
require_once('../classes/Author.php');
// тестируем всё это дело или хотя бы "пытаемся"
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

$avtor4 = new Author();
$avtor4->setName('Yulya');
$avtor4->setFamily('Simonova');
$avtor4->setPatronymic('Andreevna');
$avtor4->setId(4);

$avtor5 = new Author();
$avtor5->setName('Svetlana');
$avtor5->setFamily('Abasheeva');
$avtor5->setPatronymic('Evgenevna');
$avtor5->setId(5);

// вывод на печать
echo $avtor1->getName();
echo $avtor2->getName();
echo $avtor3->getName();
echo $avtor4->getName();
echo $avtor5->getName();

/*
$paper1 = new Paper();
$paper1->setName('Alexsandr');
$paper1->setFamily('Makedonov');
$paper1->setPatronymic('Nicolaevich');
$paper1->setId('1');

$paper2 = new Paper();
$paper2->setName('Alexsandr');
$paper2->setFamily('Makedonov');
$paper2->setPatronymic('Nicolaevich');
$paper2->setId('1');

$paper3 = new Paper();
$paper3->setName('Alexsandr');
$paper3->setFamily('Makedonov');
$paper3->setPatronymic('Nicolaevich');
$paper3->setId('1');
*/

?>