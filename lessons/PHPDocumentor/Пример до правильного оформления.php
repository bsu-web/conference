<?
/**
 * Комментарий 1
 */
 
 /**
 * Комментарий 2
 */
class Class1 {
    /**
    * Комментарий 3
    */
    public $data;
 
    /**
    * Комментарий 4
    */
    function setdata($data){
        $this->data = $data;
    }
}
/**
 * Комментарий вида 2
 */
class Test_1 extends Class1{
    /**
    * Комментарий вида 3
    */
    public $aco;
    /**
    * Комментарий вида 4
    */
    function getdata()
    {
        $this->data = $data;
    }
}
/**
 * Комментарий вида 2
 */
class Test_2 extends Class1{
    
}
/**
 * Комментарий вида 2
 */
class Class2{
    
}

/**
 * Комментарий вида 2
 */
class Test_3 extends Class2{
    
}

/**
 * Комментарий вида 4
 */
function func($param1, $param2 = 'value')
{
    static $var = 7;
    global $a;
    return $var;
}

?>