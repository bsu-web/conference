<h1>UserEdit</h1>
{if {$choice}}
<form method="post" action="/paper/PidEdit">
	<h4>Форма редактирования статьи:</h4>
	<b>uid:</b> {$id}<br/>
	<input name="title" 	 type="text"   placeholder="Название" 	/> {$title}<br/>
	<input name="content" 	 type="text"   placeholder="Контент" 		/> {$content}<br/>
	<input name="id" 		 type="hidden" placeholder="id"	value="{$id}"/>
	<input type="submit" 	 value="edit" style="height: 2em; cursor: pointer" />
</form>
{else}
{$msg}
{/if}
