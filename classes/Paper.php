<?php
require_once('Document.php');
//класс для статьи
class Paper extends Document{
    
    function getString(){ //получаем строку, содержащую название статьи и список авторов
        return $this->getTitle()." ".$this->getAuthors()->getString()."<br/>";
    }
    
    function getDocument(){
        
    }
}
?>