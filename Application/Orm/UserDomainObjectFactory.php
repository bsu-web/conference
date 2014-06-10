<?php
namespace Application\Orm;

class UserDomainObjectFactory extends \System\Orm\DomainObjectFactory{
    function doCreateObject(array $array){
        $obj= new \Application\Model\User();
        $obj->setName($array['user_name']);
        $obj->setFamily($array['user_surname']);
        $obj->setPatronymic($array['user_patronymic']);
        $obj->setId($array['user_id']);
        $obj->setBirthday($array['user_date']);
        $obj->setResidence($array['user_residence']);
        $obj->setGender($array['user_gender']);
        $obj->setEducation($array['user_education']);
        $obj->setMail($array['user_email']);
        $obj->setTelephone($array['user_work']);
        $obj->setPost($array['user_post']);
        $obj->setDegree($array['user_email']);
        $obj->setAdditionally($array['user_additionally']);
        $obj->setStatus($array['user_status']);
        
        $factory= \System\Orm\PersistenceFactory::getFactory('tag');
        $finder= new \System\Orm\DomainObjectAssembler($factory); 
        $idobj=$factory->getIndentityObject();
        $idobj->addJoin('INNER',array('tag','user_tag'),array('tag_id','tag_id'));
        $idobj->field('user_id')->eq($obj->getId());
        $tags=$finder->find($idobj,$factory->getType()); 
        foreach ($tags as $tag){
            $result[]=array('tag_id'=>$tag->getId(),'name'=>$tag->getName());
        }
        $obj->setTags($result);
        return $obj;
    }
    
    function targetClass(){
        return "Author";
    }
}
?>
