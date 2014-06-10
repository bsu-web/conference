<?php
namespace Application\Model;

class User extends \System\Orm\DomainObject{
private $name;
private $family;
private $patronymic;
private $birthday;
private $residence;
private $gender;
private $education;
private $tags;
private $role_in_group;
private $telephone;
private $mail;
private $post; //должность
private $degree; //научная степень
private $additionally; //прочая инфа
private $status;

	function setName($name){ 	 
		$this->name = $name;
        $this->markDirty();

	}
	function getName(){ 		 
		return $this->name;
	}
	function setFamily($family){ 
		$this->family = $family;
        $this->markDirty();
        
	}	
	function getFamily(){        
		return $this->family;
	}
	function setPatronymic($patronymic){	
		$this->patronymic = $patronymic;
        $this->markDirty();
	}	
	function getPatronymic(){				
		return $this->patronymic;
	}
    
    function setBirthday($birthday){ 
		$this->birthday = $birthday;
        $this->markDirty();
        
	}	
	function getBirthday(){       
		return $this->birthday;
	}
    
    function setResidence($residence){ 
		$this->residence = $residence;
        $this->markDirty();
        
	}	
	function getResidence(){       
		return $this->residence;
	}
    
    function setGender($gender){ 	 
		$this->gender = $gender;
        $this->markDirty();

	}
	function getGender(){ 		 
		return $this->gender;
	}
    
    function setEducation($education){ 	 
		$this->education = $education;
        $this->markDirty();

	}
	function getEducation(){ 		 
		return $this->education;
	}    
    
    function setTags($tags){ 	 
		$this->tags = $tags;
        $this->markDirty();

	}
	function getTags(){ 		 
		return $this->tags;
	}
    function setRoleInGroup($role){
        $this->role_in_group = $role;
        $this->markDirty();
    }

    function getRoleInGroup(){
        return $this->role_in_group;
    }	
    
        function setTelephone($telephone){ 	 
		$this->telephone = $telephone;
        $this->markDirty();

	}
	function getTelephone(){ 		 
		return $this->telephone;
	}
    
    function setMail($mail){ 	 
		$this->mail = $mail;
        $this->markDirty();

	}
	function getMail(){ 		 
		return $this->mail;
	}
    
    function setPost($post){ 	 
		$this->post = $post;
        $this->markDirty();

	}
	function getPost(){ 		 
		return $this->post;
	}
    
    function setDegree($degree){ 	 
		$this->degree = $degree;
        $this->markDirty();

	}
	function getDegree(){ 		 
		return $this->degree;
	}
    
    function setAdditionally($additionally){ 	 
		$this->additionally = $additionally;
        $this->markDirty();

	}
	function getAdditionally(){ 		 
		return $this->additionally;
	}
    
    function setStatus($status){
        $this->status=$status;
        $this->markDirty();
    }
    
    function getStatus(){
        return $this->status;
    }
    
    function targetClass(){
        return 'User';
    }	
}
?>