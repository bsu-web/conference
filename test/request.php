<?php
require_once "vendor/autoload.php";
require_once "classes/request.php";

class test_request extends PHPUnit_Framework_TestCase
{
    /**
    *   @backupGlobals enabled
    */
    public function testConstructor(){
        global $_SERVER;
        $_SERVER["QUERY_STRING"] = "Foo=Bar&Baz=Zoo";
        $R = new Request();
        $R2 = new Request("foo=bar&baz=zoo");
        $R3 = new Request("a=b&c&d=e");
        return [$R2, $R3];
    }

    /**
    *   @depends testConstructor
    */
    public function testGet($arr){
        $this->assertEquals($arr[0]->getParam("foo"), "bar");
        $this->assertEquals($arr[0]->getParam("baz"), "zoo");
        $this->assertEquals($arr[1]->getParam("a"), "b");
        $this->assertEquals($arr[1]->getParam("c"), NULL);
        $this->assertEquals($arr[1]->getParam("d"), "e");
    }

    /**
    *   @depends testConstructor
    */
    public function testSet($arr){
        $arr[0]->setParam("foo", "get");
        $this->assertEquals($arr[0]->getParam("foo"), "get");
    }

    /**
    *   @depends testConstructor
    *   @expectedException Exception
    */
    public function testForExceptions($arr){
        $this->assertEquals($arr[1]->getParam("DOESNOTEXIST"), NULL);
    }
}
?>