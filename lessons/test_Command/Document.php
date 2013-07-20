<?php
require_once('DomainObject.php');
/**
 * абстрактный класс- документ (статья или тезис или презентация)
 * @author Симонова Ю.
 * @todo Будет апгрейдится)
 * @package files
 */
abstract class Document extends DomainObject{
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
            echo $author->getFamily().'  '.$author->getName().'  '.$author->getPatronymic().'</br>';    
        }
    }
    
    function addAuthor(Author $author){
        $this->getAuthors()->add($author);
    }
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