<?php
require_once('AuthorMapper.php');
      
$author= new Author;
$author->setName('��������');
$author->setFamily('�������');
$author->setPatronymic('�����������');
$str= $author->getName().' '.$author->getFamily().'</br>';
$mapper= new AuthorMapper($DBH);
$mapper->insert($author);

$author2= $mapper->find($author->getId());
echo $author2->getId().' '.$author->getName().'</br>';
$author2->setName('�����');
$mapper->update($author);
echo $author2->getId().' '.$author2->getName().'</br>';			
echo $author->getCount();
?>