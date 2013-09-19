<h3><b>Полный список <u>журналов</u> из тестовой БД:</b></h3><hr>
{for $i=0 to $Request->getProperty("count")-1}
{$i+1}) -{$Request->getProperty("doc")->getRow($i)->getId()}- <b>{$Request->getProperty("doc")->getRow($i)->getTitle()}</b><br>
<br><u>Список статей:</u><br>{$Request->getProperty("doc")->getRow($i)->getPapers()->getTitle())}
<br><u>Список авторов:</u><br>{$Request->getProperty("doc")->getRow($i)->getAuthorStr()}<br>
<hr>
{/for}