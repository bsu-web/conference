<?php
require_once('data/AuthorIdentityObject.php');

$idobj = new AuthorIdentityObject();

//$idobj->field('title')->eq('title');
$idobj->field("name")->eq("Гарик")->field("family")->eq("Семенов");
$arr=$idobj->getComps();
print_r($arr);
echo '</br>';
$clauses=array();
foreach ($arr as $one){
    $clauses[]= $one['name'].' '.$one['operator'].' '.$one['value'];
}
$clause= "WHERE ".implode(" and ",$clauses);
echo $clause;
?>