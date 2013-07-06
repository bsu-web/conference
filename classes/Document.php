<?php
require_once('DomainObject.php');
require_once('Authors.php');
//абстрактный класс- документ (статья или тезис или презентация)
abstract class Document extends DomainObject{
    private $Authors;  //тут у нас список авторов
    private $title;    //заголовок документа
    
    abstract function getDocument();
    
    function setAuthors(Authors $Authors){  //задаем список авторов
        $this->Authors=$Authors;
    }
    
    function getAuthors(){   //выдаем список авторов
        return $this->Authors;
    }
    
    function setTitle($title){  //задаем заголовок
        $this->title= $title;
    }
    
    function getTitle(){  //выдаем заголовок документа
        return $this->title;
    }
}
?>