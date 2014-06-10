<?php
namespace Application\Model;

//класс для журнала
class Journal extends \System\Orm\DomainObject {
    private $title;
    private $users;
    private $status;
    private $imprint;
    private $description;
    private $papers;
    private $dateBegin;
    private $dateSend;
    private $dateExp;
    private $tags;
    
    function getDocument(){
        
    }
    function targetClass(){
        return 'Journal';
    }
    
    function setTitle($title){
        $this->title=$title;    
        $this->markDirty(); 
    }
    function getTitle(){
        return $this->title;    
    }
    
    function setUsers(\Application\Orm\UserCollection $users){
        $this->users=$users;
        $this->markDirty();         
    }
   
    function getUsers(){   
        if (! isset($this->users)){
            $this->users= $this->getCollection($this->targetClass(),$this->getId());
        }
        return $this->users;
    }
    
    function setPapers(\Application\Orm\PaperCollection $papers){
        $this->papers=$papers;
        $this->markDirty();         
    }
   
    function getPapers(){   
        if (! isset($this->papers)){
            $this->papers= $this->getCollection($this->targetClass(),$this->getId());
        }
        return $this->papers;
    }
    
    function addPaper(Paper $paper){
        $this->getPapers()->add($paper);
        $this->markDirty(); 
    }
    
    function setStatus($status){
        $this->status=$status;
        $this->markDirty();
    }
    
    function getStatus(){
        return $this->status;
    }
    
    function setImprint($imprint){
        $this->imprint=$imprint;
        $this->markDirty();
    }
    
    function getImprint(){
        return $this->imprint;
    }
    
    function setDescription($description){
        $this->description=$description;
        $this->markDirty();
    }
    
    function getDescription(){
        return $this->description;
    }
    
    function setDateBegin($dateBegin){
        $this->dateBegin=$dateBegin;
        $this->markDirty();
    }
    
    function getDateBegin(){
        return $this->dateBegin;
    }
    
    function setDateSend($dateSend){
        $this->dateSend=$dateSend;
        $this->markDirty();
    }
    
    function getDateSend(){
        return $this->dateSend;
    }
    
    function setDateExp($dateExp){
        $this->dateExp=$dateExp;
        $this->markDirty();
    }
    
    function getDateExp(){
        return $this->dateExp;
    }
    
    function setTags(\Application\Orm\TagCollection $tags){
        $this->tags= $tags;
        $this->markDirty();        
    }
       
    function getTags(){   
        if (! isset($this->tags)){
            $this->tags= $this->getCollection($this->targetClass(),$this->getId());
        }
        return $this->tags;
    }
    
    function addTag(Tag $tag){
        $this->getTags()->add($tag);
    }
}
?>