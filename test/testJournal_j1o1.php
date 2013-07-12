<?php
require_once('../classes/Collection.php');
require_once('../classes/Document.php');
require_once('../classes/Paper.php');
require_once('../classes/Author.php');
require_once('../classes/Journal.php');


//************
//������ ������ ������ ����� (���� �������������� ������������, ����� ���-�������-��������)
$avtor1 = new Author();
$avtor1->setName('Alexsandr');
$avtor1->setFamily('Makedonov');
$avtor1->setPatronymic('Nicolaevich');
$avtor1->setId(1);

//������ ������ ������ ����� (���� �������������� ������������, ����� ���-�������-��������)
$avtor2 = new Author();
$avtor2->setName('Sergey');
$avtor2->setFamily('Nekgin');
$avtor2->setPatronymic('Petrovich');
$avtor2->setId(2);

//������ ������ ������ ����� (���� �������������� ������������, ����� ���-�������-��������)
$avtor3 = new Author();
$avtor3->setName('Irina');
$avtor3->setFamily('Abageeva');
$avtor3->setPatronymic('Yurevna');
$avtor3->setId(3);

//������ ������� ������/������ ������
$authors1 = new Authors();
$authors1->insert($avtor1); //+1 � 1�� ����� �������
$authors1->insert($avtor2); //+1 � 1�� ����� �������

$authors2= new Authors();
$authors2->insert($avtor3); //+1 �� 2�� ����� �������

//������ ������� ������ ������
$t1=new Paper();
$t1->setTitle("���"); //��������
$t1->setAuthors($authors1); //��������� �������� ������ �������
$t1->setId("1"); //id-���� ������

echo "<hr>";
print_r ($t1); //����� ������������ ���� ������� �������
echo "<hr>";

//������ ������� ������ ������
$t2=new Paper();
$t2->setTitle("Name"); //��������
$t2->setAuthors($authors2); //��������� �������� ������ �������
$t2->setId("2"); //id-���� ������

//������ ������� ������ ������ (������/�����������/������)
$s=new Journal();
$s->insert($t1); //+1 ������ 
$s->insert($t2); //+1 ������
echo $s->getString(); //������� ������� ����� ������
echo "<hr>";
print_r($s->getAll()); //����� �������
?>