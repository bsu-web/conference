<?
/**
 * ����������� 1
 */
 
 /**
 * ����������� 2
 */
class Class1 {
    /**
    * ����������� 3
    */
    public $data;
 
    /**
    * ����������� 4
    */
    function setdata($data){
        $this->data = $data;
    }
}
/**
 * ����������� ���� 2
 */
class Test_1 extends Class1{
    /**
    * ����������� ���� 3
    */
    public $aco;
    /**
    * ����������� ���� 4
    */
    function getdata()
    {
        $this->data = $data;
    }
}
/**
 * ����������� ���� 2
 */
class Test_2 extends Class1{
    
}
/**
 * ����������� ���� 2
 */
class Class2{
    
}

/**
 * ����������� ���� 2
 */
class Test_3 extends Class2{
    
}

/**
 * ����������� ���� 4
 */
function func($param1, $param2 = 'value')
{
    static $var = 7;
    global $a;
    return $var;
}

?>