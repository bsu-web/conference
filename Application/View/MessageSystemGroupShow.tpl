﻿Пользователь : {$user->getName()} {$user->getFamily()}
<h1>Группа : {$messagegroup->getTitle()}</h1><br>
Автор : [{$messagegroup->getAuthor()->getName()} {$messagegroup->getAuthor()->getFamily()}]<br>
Участники : 
{foreach from = $messagegroup->getPartners() item = p}
	[{$p->getName()} {$p->getFamily()}]
{/foreach}
<br>
<a href="/message/show/groups">Назад</a>
<hr>
{foreach from=$messagegroup->getMessages() item=f}
	Автор : {$f->getAuthor()->getName()} {$f->getAuthor()->getFamily()}<br>
	Текст : {$f->getText()}<br>
	Время : {$f->getDate()}<br>
	{if $f->getFile()}
		Файл  : {$f->getFile()} <a href='/message/get/file'>[Получить]</a><hr>
	{else}
		<hr>
	{/if}
{/foreach}
Добавить сообщение<br>
<form method="POST" action="/message/create/message" enctype="multipart/form-data">
	Текст : <input type='text' name='text'><br>
	<input type='hidden' name='author' value={$user->getId()}>
	<input type='hidden' name='group_id' value={$messagegroup->getId()}>
	Файл  : <input type=file name=uploadfile><br>
	<input type='submit' value='Отправить'>
</form>