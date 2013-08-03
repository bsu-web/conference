<?php
require_once('UpdateFactory.php');

class PaperUpdateFactory extends UpdateFactory{
    function newUpdate(DomainObject $obj){
        //�������� ����� ���������� ��������
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
    
    function InsertLink(DomainObject $obj){
        $authors=$obj->getAuthors();
        $links= array('paper_id','author_id'); //���� ������� ������
        $query=$this->buildLinks('paper_authors',$links); // ��� ������� ������ + ������ �����
        foreach ($authors as $author){ // ������ ������ ��� ������� � ��
            $values[]=array($obj->getId(),$author->getId());
        }  
        return array($query,$values);
    }
}

?>