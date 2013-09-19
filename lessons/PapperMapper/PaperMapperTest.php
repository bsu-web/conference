<?php
require_once('PaperMapper.php');
require_once('HelperFactory.php');

$paper_mapper= new PaperMapper();
$paper= $paper_mapper->find(1); //����� ������ �� ��
echo $paper->getTitle().'</br>'.$paper->getContent().'</br>';
$authors=$paper->getAuthors();
$paper->getAuthorStr();




//� ������ ���� ������� ����� ������ � ��

$a1= new Author;
$a1->setName('�������');
$a1->setFamily('�������');
$a1->setPatronymic('����������');
$map= new AuthorMapper;
$map->insert($a1);
$a2= $map->find(2);

$authors2= HelperFactory::getCollection('Author');
echo "<br><br>111<br>";
$authors2->add($a1);
$authors2->add($a2);

$paper2= new Paper;
$paper2->setTitle('����� ������');
$paper2->setContent('����� �������');
$paper2->setAuthors($authors2);

$map_pap= new PaperMapper;
$map_pap->insert($paper2);

//���� ���������� � ��- ����� ��� ���� ��������. �� � ��� �� �� ����� ��������

$paper2->setTitle('���������� ���������!');
$map_pap->update($paper2);
?>