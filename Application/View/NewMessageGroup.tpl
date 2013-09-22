<h1>Создание группы</h1><br>
<a href="/message/show/groups">Назад</a>
<hr>
<form method="POST" action="/message/create/group">
	Название : <input type='text' name='title'><br>
	<input type='hidden' name='author' value={$user_id}>
	<hr>
	{foreach from=$users item=f}
		<input name="user[]" type="checkbox" value={$f.user_id}>{$f.name}<br>
	{/foreach}
	<hr>
	<input type='submit' value='Отправить'>
</form>