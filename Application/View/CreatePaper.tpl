<h1>Create Paper</h1>
<form method="post" action="/paper/createStart">
	<h4>Форма билда статьи:</h4>
	<input name="title" 	 type="text"   placeholder="Образец"	/>Название<br/>
	<input name="content" 	 type="text"   placeholder="Образец" 	/>Контент<br/>
	{foreach from=$array key=key item=foo}<br/>{$key+1}
		<input name="author{$key+1}" 	 type="checkbox"   value="{$foo.id}" />&nbsp;({$foo.id}) {$foo.family} {$foo.name} {$foo.patronymic}
	{/foreach}<br/><br/>
	<input type="submit" 	 value="build" style="height: 2em; cursor: pointer" />	
</form>
