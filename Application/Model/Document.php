<?php
namespace Application\Model;
/**
 * абстрактный класс- документ (статья или тезис или презентация)
 * @author Симонова Ю.
 * @todo Будет апгрейдится)
 * @package files
 */
abstract class Document extends \System\Orm\DomainObject{
    private $users; 
    private $title;    
	private $abstract;
    private $url;
    private $bibliography;
    private $status;
    private $description;
    private $posBegin;
    private $posEnd;
    private $tagId;
    abstract function getDocument();
    /**
     * задаем список авторов
     * @param $Authors Список авторов

     */
    function setUsers(\Application\Orm\UserCollection $users){
        $this->users= $users;
        $this->markDirty();        
    }
    /**
     * выдаем список авторов
     */    
    function getUsers(){   
        if (! isset($this->users)){
            $this->users= $this->getCollection($this->targetClass(),$this->getId());
        }
        return $this->users;
    }
    
    function addUser(User $user){
        $this->getUsers()->add($user);
    }
    /**
     * задаем заголовок
     * @param $title заголвок
     */    
    function setTitle($title){  
        $this->title= $title;
        $this->markDirty();
    }
    /**
     * выдаем заголовок документа
     * @return string
     */    
    function getTitle(){  
        return $this->title;
    }
    /**
     * задаем заголовок
     * @param $title заголвок
     */    
    function setAbstract($abstract){  
        $this->abstract= $abstract;
        $this->markDirty();
    }
    /**
     * выдаем заголовок документа
     * @return string
     */    
    function getAbstract(){  
        return $this->abstract;
    }
    
    function setUrl($url){
        $this->url=$url;
        $this->markDirty();
    }
    
    function getUrl(){
        return $this->url;
    }
    
    function setBibliography($bibliography){
        $this->bibliography=$bibliography;
        $this->markDirty();
    }
    
    function getBibliography(){
        return $this->bibliography;
    }
    
    function setStatus($status){
        $this->status=$status;
        $this->markDirty();
    }
    
    function getStatus(){
        return $this->status;
    }
    
    function setDescription($description){
        $this->description=$description;
        $this->markDirty();
    }
    
    function getDescription(){
        return $this->description;
    }
    
    function setPosBegin($posBegin){
        $this->posBegin=$posBegin;
        $this->markDirty();
    }
    
    function getPosBegin(){
        return $this->posBegin;
    }
    
    function setPosEnd($posEnd){
        $this->posEnd=$posEnd;
        $this->markDirty();
    }
    
    function getPosEnd(){
        return $this->posEnd;
    }
    
    function setTagId($tagId){
        $this->tagId=$tagId;
        $this->markDirty();
    }
    
    function getTagId(){
        return $this->tagId;
    }
}
?>