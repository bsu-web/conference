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
        @throws InvalidArgumentException if nreq won't be equal to 48 there will be an exception
        @return string Hello world
    */
    public function badMethod($nreq=48){
        if($nreq != 48){
            throw new InvalidArgumentException("nreq must be 48");
        }
        return "Hello World";
    }

    /**
        
    */
    public function __construct(){

    }
}
?>