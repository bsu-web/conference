<h3><b>������ ������ <u>�������</u> �� �������� ��:</b></h3>
<hr>
{for $i=0 to $Request->getProperty("count")-1}
{$i+1}) -{$Request->getProperty("doc")->getRow($i)->getId()}- {$Request->getProperty("doc")->getRow($i)->getFamily()} {$Request->getProperty("doc")->getRow($i)->getName()} {$Request->getProperty("doc")->getRow($i)->getPatronymic()}<br>
<hr>
{/for}
