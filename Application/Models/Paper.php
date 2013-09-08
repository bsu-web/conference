<?php
namespace Application\Models;

//класс для статьи
class Paper extends Application\Models\Document{
    function getDocument(){
     //clear   
    }
    
    function targetClass(){
        return 'Paper';
    }
}
?>