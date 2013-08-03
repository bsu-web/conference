<?php
require_once('PersistenceFactory.php');
require_once('DomainObjectAssembler.php');

$factory= PersistenceFactory::getFactory('Author');
$finder= new DomainObjectAssembler($factory);
$idobj=$factory->getIndentityObject()->field('id')->eq(16);
$author= $finder->findOne($idobj);

echo $author->getName().' '.$author->getFamily();
$author->setName('�����');
$finder->insert($author);

$insrt= new Author();
$insrt->setName('����');
$insrt->setFamily('�������');
$insrt->setPatronymic('�����');
$finder->insert($insrt);
echo $insrt->getId();
?>