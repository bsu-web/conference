<?php
require_once('PersistenceFactory.php');
require_once('DomainObjectAssembler.php');

$factory= PersistenceFactory::getFactory('Paper');
$finder= new DomainObjectAssembler($factory);
$idobj=$factory->getIndentityObject()->field('id')->eq(1);
$paper= $finder->findOne($idobj);
echo $paper->getTitle().'</br>'.$paper->getContent().'</br>';
$authors= $paper->getAuthors();
foreach ($authors as $author){
    echo $author->getName().' '.$author->getFamily().'</br>';
}

$paper->setTitle('я изменила заголовок!');
$finder->insert($paper);

//вставка статьи!!!
$author_factory=PersistenceFactory::getFactory('Author');
$finder_aut= new DomainObjectAssembler($author_factory);
$idobj_au=$author_factory->getIndentityObject()->field('id')->eq(15);
$a1=$finder_aut->findOne($idobj_au);
echo $a1->getName().' '.$a1->getFamily().'</br>';

$idobj_au=$author_factory->getIndentityObject();
$idobj_au->field('id')->eq(17);
$a2=$finder_aut->findOne($idobj_au);
echo $a2->getName().' '.$a2->getFamily().'</br>';

$au_col=$author_factory->getCollection();
$au_col->add($a1);
$au_col->add($a2);

$pap_ins= new Paper();
$pap_ins->setTitle('Статья');
$pap_ins->setContent('Контент...контент...контент');
$pap_ins->setAuthors($au_col);
$finder->insert($pap_ins);


?>