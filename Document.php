<?php
require_once('DomainObject.php');
require_once('Authors.php');
/**
* абстрактный класс- документ (статья или тезис или презентация)
* @author Симонова Ю.
* @todo Будет апгрейдится)
* @package files
*/
abstract class Document extends DomainObject{
    private $Authors;
    private $title;
private $content;
    abstract function getDocument();
    /**
* задаем список авторов
* @param $Authors Список авторов
*/
    function setAuthors(Authors $Authors){
        $this->Authors=$Authors;
    }
    /**
* выдаем список авторов
*/
    function getAuthors(){
        return $this->Authors;
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