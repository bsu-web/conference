<?php
require_once('Document.php');
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