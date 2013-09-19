<?php
require_once('PersistenceFactory.php');
require_once('DomainObjectAssembler.php');

$factory= PersistenceFactory::getFactory('Author');
$finder= new DomainObjectAssembler($factory);
$idobj=$factory->getIndentityObject()->field('id')->eq(16);
$author= $finder->findOne($idobj);

echo $author->getName().' '.$author->getFamily();
$author->setName('Ivan');
$finder->insert($author);

$insrt= new Author();
$insrt->setName('Agdry');
$insrt->setFamily('Novikov');
$insrt->setPatronymic('Iluch');
$finder->insert($insrt);
echo $insrt->getId();
?>