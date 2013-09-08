<?php
namespace app\models;
//класс для статьи
class Paper extends Document{
    function getDocument(){
     //clear   
    }
    
    function targetClass(){
        return 'Paper';
    }
}
?>