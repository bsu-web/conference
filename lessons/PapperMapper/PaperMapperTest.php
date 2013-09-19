<?php
require_once('PaperMapper.php');
require_once('HelperFactory.php');

$paper_mapper= new PaperMapper();
$paper= $paper_mapper->find(1); //берем статью из БД
echo $paper->getTitle().'</br>'.$paper->getContent().'</br>';
$authors=$paper->getAuthors();
$paper->getAuthorStr();




//а теперь сами добавим новую статью в БД

$a1= new Author;
$a1->setName('Николай');
$a1->setFamily('Семенов');
$a1->setPatronymic('Алексеевич');
$map= new AuthorMapper;
$map->insert($a1);
$a2= $map->find(2);

$authors2= HelperFactory::getCollection('Author');
echo "<br><br>111<br>";
$authors2->add($a1);
$authors2->add($a2);

$paper2= new Paper;
$paper2->setTitle('Новая статья');
$paper2->setContent('Новый контент');
$paper2->setAuthors($authors2);

$map_pap= new PaperMapper;
$map_pap->insert($paper2);

//если посмотреть в бд- вроде все норм работает. но я еще не до конца допилила

$paper2->setTitle('Измененный заголовок!');
$map_pap->update($paper2);
?>