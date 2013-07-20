<?php
require_once('JournalMapper.php');
require_once('HelperFactory.php');

/* //вывод на печать журнала из Базы Данных
$journal_mapper= new JournalMapper();
$journal= $journal_mapper->find(1);                 //берем журнал из БД
echo 'Имя журнала из БД с id=1:'.$journal->getTitle().'</br>';
$papers=$journal->getPapers();                      //берем статьи этого журнала
$journal->getPaperStr();                            //выводим строку статей
*/


//а теперь сами добавим новый журнал в БД*
$a1= new Author;                                    // создадим вручную автора (забиваем ФИО)
$a1->setName('Лилия');
$a1->setFamily('Жамьянова');
$a1->setPatronymic('Владимировна');

$map= new AuthorMapper;
$map->insert($a1);
$a2= $map->find(2);                                 //второго автора возьмем из БД с id=2

$authors2= HelperFactory::getCollection('Author');  //добавляем обоих в коллекцию авторов. скучкуем
$authors2->add($a1);                                    
$authors2->add($a2);

$p1= new Paper;                                     // создадим вручную статью (забиваем имя_статьи и ее контент)                     
$p1->setTitle('Изучаем 1С');
$p1->setContent('1С1С1С1С1С1С1С1С1С1С1С1С...');
$p1->setAuthors($authors2);
$map= new PaperMapper;                              // $map нужна для доступа к таким функциям как вставка
$map->insert($p1);                                  // вставляем статью 
$p2= $map->find(2);                                 // вторую берем из бд с id=2

$papers2= HelperFactory::getCollection('Paper');    //добавляем обоих в коллекцию статей. скучкуем
$papers2->add($p1);
$papers2->add($p2);

$journal2= new Journal;                            // создадим вручную журнал (забиваем имя_журнала)  
$journal2->setTitle('1C журнал');
$journal2->setPapers($papers2);                    //пихаем коллекцию статей в журнал

$map_pap= new JournalMapper;                      // вставляем журнал  
$map_pap->insert($journal2);


//$journal2->setTitle('Лилин журнал');      //обновляем журналу имя
//$map_pap->update($journal2);
//print_r($journal2);


//вывод на печать вставленного журнала его статей и их авторов
echo 'Имя журнала: '.$journal2->getTitle().'</br>';
$papers3=$journal2->getPapers();
foreach ($papers3 as $paper){
    echo '-->Имя статьи: '.$paper->getTitle().'</br>';
//    echo 'Имя автора статьи:'.$paper->getAuthorStr().'</br>';
    $autors3=$paper->getAuthors();
    foreach ($autors3 as $author) {
        echo '______Имя и фамилия автора: '.$author->getName().'</br>';    
    }
}

?>