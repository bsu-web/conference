<?php
require_once('Document.php');

class Paper extends Document{
    
    function getString(){
        return $this->getTitle()." ".$this->getAuthors()->getString()."<br/>";
    }
    
    function getDocument(){
        
    }
}
?>