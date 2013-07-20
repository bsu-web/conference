<?php
require_once('DomainObject.php');
/**
 * абстрактный класс- документ (статья или тезис или презентация)
 * @author Абашеева С.
 * @todo Подлежит частым изменениям
 * @package files
 */
abstract class Document extends DomainObject{
    private $journals; 
    private $authors; 
    private $title;    
	private $content;
    abstract function getDocument();
    /**
     * задаем список авторов
     * @param $Authors Список авторов

     */
    function setAuthors(AuthorCollection $authors){
        $this->authors= $authors;        
    }
    /**
     * выдаем список авторов
     */    
    function getAuthors(){   
        if (! isset($this->authors)){
            $this->authors= self::getCollection('Author');
        }
        return $this->authors;
    }
    
    function getAuthorStr(){
        foreach ($this->authors as $author){
            echo $author->getName().'  '.$author->getFamily().'</br>';    
        }
    }
     
    function addAuthor(Author $author){
        $this->getAuthors()->add($author);
    }
    
    //^^^^^
        /**
     * задаем список статей
     * @param $Papers Список статей

     */
    function setPapers(PaperCollection $papers){
        $this->papers= $papers;        
    }
    /**
     * выдаем список статей
     */    
    function getPapers(){   
        if (! isset($this->papers)){
            $this->papers= self::getCollection('Paper');
        }
        return $this->papers;
    }
    
    function getPaperStr(){
        foreach ($this->papers as $paper){
            echo $paper->getTitle().'  '.'</br>';    
        }
    }
    
    function addPapers(Paper $paper){
        $this->getPapers()->add($paper);
    }
    //&&&&&
    
    
    /**
     * задаем заголовок
     * @param $title заголвок
     */    
    function setTitle($title){  
        $this->title= $title;
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
    function setContent($content){  
        $this->content= $content;
    }
    /**
     * выдаем заголовок документа
     * @return string
     */    
    function getContent(){  
        return $this->content;
    }
}
?>