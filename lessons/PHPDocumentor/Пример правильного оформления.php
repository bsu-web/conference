<?
/**
 * ���� ������� ����������� ����������������
 * 
 * ����� � ���������� ������������
 * ����������� ����� �����
 * @author �������� �.
 * @version 13.07.2013
 * @package �����
 */
 
 /**
 * ����� 1
 * @package �����
 */
class Class1 {
    /**
    * ���������� �������� �������� ���� integer
    */
    public $data;
 
    /**
    * ����� �������� �������
    * @param integer $data ��������
    * @return void ������������ ��������
    */
    function setdata($data){
        $this->data = $data;
    }
}
/**
 * �������� 1
 * @package �����
 * @subpackage ���������_Class1
 */
class Test_1 extends Class1{
    /**
    * ��������� ����������
    */
    public $aco;
    /**
    * ����� ��� ������ �������� �������
    * @return void ������������ ��������
    */
    function getdata()
    {
        $this->data = $data;
    }
}
/**
 * �������� 2
 * @package �����
 * @subpackage ���������_Class1
 */
class Test_2 extends Class1{
    
}
/**
 * ����� 2
 * @package �����
 */
class Class2{
    
}

/**
 * �������� 1
 * @package �����
 * @subpackage ���������_Class2
 */
class Test_3 extends Class2{
    
}

/**
 * ������� �������
 * @global Test ���������� ��� �� ���������� ���������� ���������� $a
 * @param string $param1 ������ �������� �������
 * @param string $param2 ������ ��������
 * @return string $var ��� ���������� �� ����� ����������
 */
function func($param1, $param2 = 'value')
{
    static $var = 7;
    global $a;
    return $var;
}

?>