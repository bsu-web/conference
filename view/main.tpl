<h2>Paper title: {$Request->getProperty("doc")->getTitle()}</h2>
<!--
<h3>Authors:<br /> {$Request->getProperty("doc")->getAuthors()->getString()}</h1>
-->
<h3>Authors: </h3>
{foreach $Request->getProperty("doc")->getAuthors()->getAll() as $author}
{$author->getName()} {$author->getFamily()} {$author->getPatronymic()}<br />
{/foreach}