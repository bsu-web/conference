<h1>Группы сообщений</h1>
{foreach from=$result item=f}
	<a href="/message/show/group/{$f.id}">{$f.title}</a> <br>
{/foreach}
<hr>
<a href="/message/new/group">Создать группу</a>