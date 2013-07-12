<?php
require_once('../classes/Collection.php');
require_once('../classes/Document.php');
require_once('../classes/Paper.php');
require_once('../classes/Author.php');
require_once('../classes/Journal.php');


//************
//создаю объект класса Автор (мимо отсутствующего конструктора, задав имя-фамилию-отчество)
$avtor1 = new Author();
$avtor1->setName('Alexsandr');
$avtor1->setFamily('Makedonov');
$avtor1->setPatronymic('Nicolaevich');
$avtor1->setId(1);

//создаю объект класса Автор (мимо отсутствующего конструктора, задав имя-фамилию-отчество)
$avtor2 = new Author();
$avtor2->setName('Sergey');
$avtor2->setFamily('Nekgin');
$avtor2->setPatronymic('Petrovich');
$avtor2->setId(2);

//создаю объект класса Автор (мимо отсутствующего конструктора, задав имя-фамилию-отчество)
$avtor3 = new Author();
$avtor3->setName('Irina');
$avtor3->setFamily('Abageeva');
$avtor3->setPatronymic('Yurevna');
$avtor3->setId(3);

//создаю элемент класса/набора Авторы
$authors1 = new Authors();
$authors1->insert($avtor1); //+1 в 1ый набор авторов
$authors1->insert($avtor2); //+1 в 1ый набор авторов

$authors2= new Authors();
$authors2->insert($avtor3); //+1 во 2ой набор авторов

//создаю элемент класса Статья
$t1=new Paper();
$t1->setTitle("Имя"); //название
$t1->setAuthors($authors1); //строковое значение набора авторов
$t1->setId("1"); //id-шник статьи

echo "<hr>";
print_r ($t1); //вывод читабельного вида массива авторов
echo "<hr>";

//создаю элемент класса Статья
$t2=new Paper();
$t2->setTitle("Name"); //название
$t2->setAuthors($authors2); //строковое значение набора авторов
$t2->setId("2"); //id-шник статьи

//создаю элемент класса Журнал (статья/презентация/тезисы)
$s=new Journal();
$s->insert($t1); //+1 статья 
$s->insert($t2); //+1 статья
echo $s->getString(); //выводим строкой набор статей
echo "<hr>";
print_r($s->getAll()); //вывод журнала
?>