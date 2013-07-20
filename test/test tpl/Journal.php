<?php
require_once('Document.php');
//класс для журнала
class Journal extends Document{
    
    function getString(){ //получаем строку, содержащую название журнала и список статей
        return $this->getTitle()." ".$this->getPapers()->getString()."<br/>";
    }
    
    function getDocument(){
        
    }
}
?>