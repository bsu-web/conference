<h3><b>������ ������ <u>������</u> �� �������� ��:</b></h3><hr>
{for $i=0 to $Request->getProperty("count")-1}
{$i+1}) -{$Request->getProperty("doc")->getRow($i)->getId()}- <b>{$Request->getProperty("doc")->getRow($i)->getTitle()}</b><br>{$Request->getProperty("doc")->getRow($i)->getContent()} <br>
<br><u>������ �������:</u><br>{$Request->getProperty("doc")->getRow($i)->getAuthorStr()}<br>
<hr>
{/for}