<?php
require_once('DomainObject.php');
require_once('Authors.php');
abstract class Document extends DomainObject{
    private $Authors;
    private $title;
    
    abstract function getDocument();
    
    function setAuthors(Authors $Authors){
        $this->Authors=$Authors;
    }
    
    function getAuthors(){
        return $this->Authors;
    }
    
    function setTitle($title){
        $this->title= $title;
    }
    
    function getTitle(){
        return $this->title;
    }
}
?>