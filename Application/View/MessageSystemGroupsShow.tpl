Пользователь : {$user->getName()} {$user->getFamily()}
<h1>Группы сообщений</h1>
{foreach from=$listgroup item=group}
	<a href="/message/show/group/{$group->getId()}">{$group->getTitle()}</a> <a href="message/group/settings/{$group->getId()}"><img src="/design/images/icons/16px/wrench.png" alt="edit"/></a><br>
{/foreach}
<hr>
<a href="/message/create/group">Создать группу</a>