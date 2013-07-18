<?php

require_once('Author.php');
require_once('AuthorMapper.php');
        
$author= new Author;
$author->setName('��������');
$author->setFamily('�������');
$author->setPatronymic('�����������');
$str= $author->getName().' '.$author->getFamily().'</br>';
$mapper= new AuthorMapper($DBH);
$mapper->insert($author);

$author= $mapper->find($author->getId());
echo $author->getId().' '.$author->getName().'</br>';
$author->setName('�����');
$mapper->update($author);
echo $author->getId().' '.$author->getName().'</br>';			

?>