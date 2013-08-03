<?php
require_once('data/AuthorIdentityObject.php');
require_once('data/SelectionFactory.php');

$idobj = new AuthorIdentityObject();
//$idobj->addWhat(array('name','family'));
//$idobj->addJoin('INNER',array('author','paper_authors'),array('id','author_id'));
//$idobj->addOrder(array('name'=>'DESC','family'=>'ASC'));
//$idobj->addLimit(array(2,3));
//$idobj->field('name')->eq('������')->field("family")->like("%��",true)->changeLink();


$sel=new SelectionFactory();
$result= $sel->newSelection($idobj,'author');

print_r($result);


?>