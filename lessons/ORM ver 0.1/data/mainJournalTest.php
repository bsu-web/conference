<?php
require_once('PersistenceFactory.php');
require_once('DomainObjectAssembler.php');

$factory= PersistenceFactory::getFactory('Journal');
$finder= new DomainObjectAssembler($factory);
$idobj=$factory->getIndentityObject()->field('id')->eq(1);
$journal= $finder->findOne($idobj);
echo $journal->getTitle().'</br>';
$papers= $journal->getPapers();
foreach ($papers as $paper){
    echo $paper->getTitle().'</br>'.$paper->getContent().'</br>';
}

$paper_factory= PersistenceFactory::getFactory('Paper');
$finder_paper=new DomainObjectAssembler($paper_factory);
$idobj_p=$paper_factory->getIndentityObject()->field('id')->eq(2);
$p1=$finder_paper->findOne($idobj_p);
$idobj_p=$paper_factory->getIndentityObject()->field('id')->eq(6);
$p2=$finder_paper->findOne($idobj_p);

$pCol=$paper_factory->getCollection();
$pCol->add($p1);
$pCol->add($p2);

$jor_insrt= new Journal();
$jor_insrt->setTitle('Журнал вставлен!');
$jor_insrt->setPapers($pCol);
$finder->insert($jor_insrt);

$jor_insrt->setTitle('Другой загловок');
$finder->insert($jor_insrt);

?>