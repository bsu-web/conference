﻿Пользователь : {$user->getName()} {$user->getFamily()}
﻿<h1>Создание группы</h1><br>
<a href="/message/show/groups">Назад</a>
<hr>
<form method="POST" action="/message/create/group">
	Название : <input type='text' name='title'><br><br>
	Описание : <input type='text' name='description'><br>
	<input type='hidden' name='author' value={$user->getId()}>
	<hr>
	{foreach from=$users item=f}
		<input name="users[]" type="checkbox" value={$f.user_id}>{$f.name} {$f.family}<br>
	{/foreach}
	<hr>
	<input type='submit' value='Создать'>
</form>