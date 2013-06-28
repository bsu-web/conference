<?php
/**
    Useless demo class 
    @author nekjine
    @version 0.0
    @see http://example.com Documentation

    @api
*/

class Useless {
    /**
        @type int
    */
    protected $trickyCounter;

    /**
        This function does nothing
        @param mixed magicParam Useless magic parameter
        @return int Just a zero as a result
    */
    public function doNothing($magicParam){
        echo "doNothing() call with param $magicParam";
        return 0;
    }

    /**
        This function returns hello world string
        @deprecated 0.1 This method is bad and will be removed soon
        @return string Hello world
    */
    public function badMethod(){
        return "hello world";
    }

    /**
        
    */
    public function __construct(){

    }
}
?>