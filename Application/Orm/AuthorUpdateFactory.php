<?php
namespace Application\Orm;

class AuthorUpdateFactory extends \System\Orm\UpdateFactory{
    function newUpdate(\System\Orm\DomainObject $obj){
        //�������� ����� ���������� ��������
        $id= $obj->getId();
        $cond=null;
        $values['name']=$obj->getName();
        $values['family']=$obj->getFamily();
        $values['patronymic']= $obj->getPatronymic();
        if ($id >-1){
            $cond['id']=$id;
        }
        return $this->buildStatement('author',$values,$cond);
    }
}

?>