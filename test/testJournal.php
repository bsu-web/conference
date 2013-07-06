<?php
require_once('../classes/Author.php');
require_once('../classes/Authors.php');
require_once('../classes/Collection.php');
// тестируем всё это дело или хотя бы "пытаемся"

//создаем объект типа Автор с именем avtor1
$avtor1 = new Author();
$avtor1->setName('Alexsandr');
$avtor1->setFamily('Makedonov');
$avtor1->setPatronymic('Nicolaevich');
$avtor1->setId(1);

//создаем объект типа Автор с именем avtor2
$avtor2 = new Author();
$avtor2->setName('Sergey');
$avtor2->setFamily('Nekgin');
$avtor2->setPatronymic('Petrovich');
$avtor2->setId(2);

//создаем объект типа Автор с именем avtor3
$avtor3 = new Author();
$avtor3->setName('Irina');
$avtor3->setFamily('Abageeva');
$avtor3->setPatronymic('Yurevna');
$avtor3->setId(3);

//создаем объект типа Автор с именем avtor4
$avtor4 = new Author();
$avtor4->setName('Yulya');
$avtor4->setFamily('Simonova');
$avtor4->setPatronymic('Andreevna');
$avtor4->setId(4);

//создаем объект типа Автор с именем avtor5
$avtor5 = new Author();
$avtor5->setName('Svetlana');
$avtor5->setFamily('Abasheeva');
$avtor5->setPatronymic('Evgenevna');
$avtor5->setId(5);

// выводим имена авторов на печать
echo "Avtors: <br/>".$avtor1->getName()." ";
echo $avtor1->getFamily()." <br/>";
echo $avtor2->getName()." ";
echo $avtor2->getFamily()." <br/>";
echo $avtor3->getName()." ";
echo $avtor3->getFamily()." <br/>";
echo $avtor4->getName()." ";
echo $avtor4->getFamily()." <br/>";
echo $avtor5->getName()." ";
echo $avtor5->getFamily()." <br/>";
/*
$authors new Authors();
$authors->insert($avtor1);
$authors->insert($avtor2);

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