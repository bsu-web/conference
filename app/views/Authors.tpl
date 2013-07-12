<!doctype html>
<html>
<body>
<h1>Authors</h1>
<hr>
{if $authors}
{foreach from=$authors item=author}
	{$author->getFamily()} {$author->getName()} {$author->getPatronymic()}<br />
{/foreach}
{else}
	Current author list is empty
{/if}
<hr>
<form method="post" action="authors_add">
	Name: <input name="name"> | 
	Lastname: <input name="family"> | 
	Patronym: <input name="patronym">
	<input type="submit">
</form>

<br />
<a href="authors_drop">Drop all</a>
</body>
</html>