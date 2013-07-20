<?php
require_once('DomainObject.php');

abstract class Document extends DomainObject{
    private $authors; 
    private $title;    
	private $content;
    abstract function getDocument();
    
    function setAuthors(AuthorCollection $authors){
        $this->authors= $authors;        
    }
	function setPapers(PaperCollection $papers){
        $this->papers= $papers;        
    }
 
    function getAuthors(){   
        if (! isset($this->authors)){
            $this->authors= self::getCollection('Author');
        }
        return $this->authors;
    }
    function getPapers(){   
        if (! isset($this->papers)){
            $this->papers= self::getCollection('Paper');
        }
        return $this->papers;
    }
	
    
    function getAuthorStr(){
        foreach ($this->authors as $author){
            echo $author->getFamily().'  '.$author->getName().'  '.$author->getPatronymic().'<br>';    
        }
    }
    function getPaperStr(){
        foreach ($this->papers as $paper){
            echo $paper->getTitle().'  '.$paper->getContent().'<br>'; 
			foreach ($paper->getAuthors() as $author){
				 echo $author->getFamily().'  '.$author->getName().'  '.$author->getPatronymic().'<br>';				
			}
			echo "описать вывод авторов<br>";
			//--^
        }
    }
	
    function addAuthor(Author $author){
        $this->getAuthors()->add($author);
    }
   
    function setTitle($title){  
        $this->title= $title;
    }
   
    function getTitle(){  
        return $this->title;
    }
    
    function setContent($content){  
        $this->content= $content;
    }
 
    function getContent(){  
        return $this->content;
    }
}
?>