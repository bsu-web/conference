<?php
namespace app\models;
//класс для журнала
class Journal extends DomainObject {
    private $title;
    private $papers;
    
    function getDocument(){
        
    }
    function targetClass(){
        return 'Journal';
    }
    
    function setTitle($title){
        $this->title=$title;    
    }
    function getTitle(){
        return $this->title;    
    }
    
    function setPapers(Application\Orm\PaperCollection $papers){
        $this->papers=$papers;        
    }
   
    function getPapers(){   
        if (! isset($this->papers)){
            $this->papers= $this->getCollection($this->targetClass(),$this->getId());
        }
        return $this->papers;
    }
}
?>