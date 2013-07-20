<?php
abstract class Collection{ //àáñòðàêòíûé êëàññ íàáîðà îáúåêòîâ
private $set=array();
private $title="";
function insert (DomainObject $object){ //ôóíêöèÿ äîáàâëÿåíèÿ îáúåêòà â íàáîð
if (in_array($object, $this->set, true)){
return;
}
$id=$object->getId();
$this->set[$id]=$object;
}
function delete(DomainObject $object){ //ôóíêöèÿ óäàëåíèÿ ýëåìåíòà èç íàáîðà
$id=$object->getId();
$search_array = array_key_exists($id, $this->set);
if ($search_array){
unset($this->set[$id]);
}	
}
function getAll(){ //ôóíêöèÿ âûäàåò ìàññèâ âñåõ îáúåêòîâ êëàññà
return $this->set;
}
}
?>