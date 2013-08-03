<?php
require_once('PersistenceFactory.php');
require_once('DomainObjectAssembler.php');
require_once('ObjectWather.php');

$factory= PersistenceFactory::getFactory('Author');
$finder= new DomainObjectAssembler($factory);
$idobj=$factory->getIndentityObject();
$authors= $finder->find($idobj);
foreach ($authors as $author){
    echo $author->getId().' '.$author->getName().' '.$author->getFamily().'</br>';
}

$idobj=$factory->getIndentityObject()->field('id')->eq(16);
$auth1=$finder->findOne($idobj);
echo $auth1->getName().' '.$author->getFamily().'</br>';
$auth1->setName('Евлампий');

$p_factory=PersistenceFactory::getFactory('Paper');
$p_finder= new DomainObjectAssembler($p_factory);

$idobj=$factory->getIndentityObject()->field('id')->eq(1);
$a1=$finder->findOne($idobj);
$idobj=$factory->getIndentityObject();
$idobj->field('id')->eq(2);
$a2=$finder->findOne($idobj);

$au_col=$factory->getCollection();
$au_col->add($a1);
$au_col->add($a2);

$paper= new Paper();
$paper->setTitle('Новая тестовая статья');
$paper->setContent('Проверяем как работает ObjectWather');
$paper->setAuthors($au_col);

//ObjectWatcher::instance()->performOperations();



?>