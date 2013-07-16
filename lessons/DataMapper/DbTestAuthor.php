<?php

require_once('Author.php');
require_once('AuthorMapper.php');
        
$author= new Author;
$author->setName('Светлана');
$author->setFamily('Нагаева');
$author->setPatronymic('Геннадьевна');
$str= $author->getName().' '.$author->getFamily().'</br>';
$mapper= new AuthorMapper($DBH);
$mapper->insert($author);

$author= $mapper->find($author->getId());
echo $author->getId().' '.$author->getName().'</br>';
$author->setName('Мария');
$mapper->update($author);
echo $author->getId().' '.$author->getName().'</br>';			

?>