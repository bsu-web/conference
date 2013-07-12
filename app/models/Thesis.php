<?php
require_once('Document.php');

class Thesis extends Document{
    
    function getString(){
        return $this->getTitle()." ".$this->getAuthors()->getString()."<br/>";
    }
    
    function getDocument(){
        
    }
}
?>