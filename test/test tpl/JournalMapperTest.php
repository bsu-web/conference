<?php
require_once('JournalMapper.php');
require_once('HelperFactory.php');

/* //����� �� ������ ������� �� ���� ������
$journal_mapper= new JournalMapper();
$journal= $journal_mapper->find(1);                 //����� ������ �� ��
echo '��� ������� �� �� � id=1:'.$journal->getTitle().'</br>';
$papers=$journal->getPapers();                      //����� ������ ����� �������
$journal->getPaperStr();                            //������� ������ ������
*/


//� ������ ���� ������� ����� ������ � ��*
$a1= new Author;                                    // �������� ������� ������ (�������� ���)
$a1->setName('�����');
$a1->setFamily('���������');
$a1->setPatronymic('������������');

$map= new AuthorMapper;
$map->insert($a1);
$a2= $map->find(2);                                 //������� ������ ������� �� �� � id=2

$authors2= HelperFactory::getCollection('Author');  //��������� ����� � ��������� �������. ��������
$authors2->add($a1);                                    
$authors2->add($a2);

$p1= new Paper;                                     // �������� ������� ������ (�������� ���_������ � �� �������)                     
$p1->setTitle('������� 1�');
$p1->setContent('1�1�1�1�1�1�1�1�1�1�1�1�...');
$p1->setAuthors($authors2);
$map= new PaperMapper;                              // $map ����� ��� ������� � ����� �������� ��� �������
$map->insert($p1);                                  // ��������� ������ 
$p2= $map->find(2);                                 // ������ ����� �� �� � id=2

$papers2= HelperFactory::getCollection('Paper');    //��������� ����� � ��������� ������. ��������
$papers2->add($p1);
$papers2->add($p2);

$journal2= new Journal;                            // �������� ������� ������ (�������� ���_�������)  
$journal2->setTitle('1C ������');
$journal2->setPapers($papers2);                    //������ ��������� ������ � ������

$map_pap= new JournalMapper;                      // ��������� ������  
$map_pap->insert($journal2);


//$journal2->setTitle('����� ������');      //��������� ������� ���
//$map_pap->update($journal2);
//print_r($journal2);


//����� �� ������ ������������ ������� ��� ������ � �� �������
echo '��� �������: '.$journal2->getTitle().'</br>';
$papers3=$journal2->getPapers();
foreach ($papers3 as $paper){
    echo '-->��� ������: '.$paper->getTitle().'</br>';
//    echo '��� ������ ������:'.$paper->getAuthorStr().'</br>';
    $autors3=$paper->getAuthors();
    foreach ($autors3 as $author) {
        echo '______��� � ������� ������: '.$author->getName().'</br>';    
    }
}

?>