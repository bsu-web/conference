<h1>Группа : {$mgtitle}</h1><br>
<a href="/message/show/groups">Назад</a>
<hr>
{foreach from=$messages item=f}
	{$f.name} <br>{$f.text}<br> {$f.datetime}<hr>
{/foreach}
Добавить сообщение<br>
<form method="POST" action="/message/create/message">
	Текст : <input type='text' name='text'><br>
	<input type='hidden' name='author' value={$user_id}>
	<input type='hidden' name='group_id' value={$mgid}>
	<input type='submit' value='Отправить'>
</form>