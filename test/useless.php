<?php
require_once "vendor/autoload.php";
require_once "classes/useless.php";

class test_useless extends PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $u = new Useless();
        $this->assertNotNull($u);
        return $u;
    }
    /**
    *   @depends testConstructor
    */
    public function testDoNothing($u)
    {
        $this->assertEquals($u->doNothing("Magic Param"), 0);
        return $u;
    }

    /**
    *   @depends testDoNothing
    */
    public function testBadMethod($u)
    {
        $this->assertEquals($u->badMethod(), "Hello World");
        return $u;
    }

    /**
    *   @depends testConstructor
    *   @expectedException InvalidArgumentException
    */
    public function testBadMethodException($u)
    {
        $u->badMethod(37);
        return $u;
    }
}
?>