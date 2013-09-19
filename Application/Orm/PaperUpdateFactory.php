<?php
namespace Application\Orm;

class PaperUpdateFactory extends \System\Orm\UpdateFactory{
    function newUpdate(\System\Orm\DomainObject $obj){
        //ѕроверку типов желательно добавить
        $id= $obj->getId();
        $cond=null;
        $values['title']=$obj->getTitle();
        $values['content']=$obj->getContent();
        if ($id >-1){
            $cond['id']=$id;
            return $this->buildStatement('paper',$values,$cond);
        }
        return $this->buildStatement('paper',$values,$cond,true);
    }
    
    function InsertLink(\System\Orm\DomainObject $obj){
        $authors=$obj->getAuthors();
        $links= array('paper_id','author_id'); //пол€ табоицы св€зей
        $query=$this->buildLinks('paper_authors',$links); // им€ таблицы св€зей + массив полей
        foreach ($authors as $author){ // задаем массив дл€ вставки в Ѕƒ
            $values[]=array($obj->getId(),$author->getId());
        }  
        return array($query,$values);
    }
}

?>