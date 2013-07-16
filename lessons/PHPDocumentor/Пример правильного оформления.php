<?
/**
 * Файл примера правильного документирования
 * 
 * Здесь я постараюсь использовать
 * максимально много тегов
 * @author Рыгзынов А.
 * @version 13.07.2013
 * @package Файлы
 */
 
 /**
 * Класс 1
 * @package Файлы
 */
class Class1 {
    /**
    * Переменная хранящая значение типа integer
    */
    public $data;
 
    /**
    * Метод создания обьекта
    * @param integer $data Параметр
    * @return void Возвращаемое значение
    */
    function setdata($data){
        $this->data = $data;
    }
}
/**
 * Подкласс 1
 * @package Файлы
 * @subpackage Подклассы_Class1
 */
class Test_1 extends Class1{
    /**
    * Публичная переменная
    */
    public $aco;
    /**
    * Метод еще одного создания обьекта
    * @return void возвращаемое значение
    */
    function getdata()
    {
        $this->data = $data;
    }
}
/**
 * Подкласс 2
 * @package Файлы
 * @subpackage Подклассы_Class1
 */
class Test_2 extends Class1{
    
}
/**
 * Класс 2
 * @package Файлы
 */
class Class2{
    
}

/**
 * Подкласс 1
 * @package Файлы
 * @subpackage Подклассы_Class2
 */
class Test_3 extends Class2{
    
}

/**
 * Обычная функция
 * @global Test показываем что мы используем глобальную переменную $a
 * @param string $param1 Первый параметр функции
 * @param string $param2 Второй параметр
 * @return string $var Эту переменную мы будем возвращать
 */
function func($param1, $param2 = 'value')
{
    static $var = 7;
    global $a;
    return $var;
}

?>