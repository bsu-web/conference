<h2>Paper title: {$Request->getProperty("doc")->lol()}</h2>

{for $i=0 to $Request->getProperty("count")-1}
{$Request->getProperty("doc")->getRow($i)->getId()}) {$Request->getProperty("doc")->getRow($i)->getFamily()} {$Request->getProperty("doc")->getRow($i)->getName()} {$Request->getProperty("doc")->getRow($i)->getPatronymic()}<br>

{/for}
