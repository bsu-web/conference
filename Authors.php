<?php
require_once('Collection.php');
class Authors extends Collection{ //êëàññ "íàáîð àâòîðîâ"
	function getString(){ //ôóíêöèÿ âîçâðàùàåò íàáî àâòîðîâ äëÿ êîíêðåòíîé ñòàòüè/ïðåçåíòàöèè/òåçèñà etc.
		$array=$this->getAll(); //ïîëó÷åíèå ìàññèâ îáúåêòîâ èç ðîäèòåëüñêîãî êëàññà
		$s="";
		foreach ($array as $vArray){
			$s .= $vArray->getName() . " " . $vArray->getFamily() . " " . $vArray->getPatronymic() . "<br />";
		}
		return $s;
	}
}
?>