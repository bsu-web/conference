<h1>UserEdit</h1>
{if {$choice}}
<form method="post" action="/profile/UidEdit">
	<h4>Форма редактирования пользователя:</h4>
	<b>uid:</b> {$id}<br/>
	<input name="family" 	 type="text"   placeholder="Фамилия" 	/> {$family}<br/>
	<input name="name" 	 	 type="text"   placeholder="Имя" 		/> {$name}<br/>
	<input name="patronymic" type="text"   placeholder="Отчество"	/> {$patronymic}<br/><br/>
	<input name="id" 		 type="hidden"  placeholder="id"	value="{$id}"		/>
	<input type="submit" 	 value="edit" style="height: 2em; cursor: pointer" />
</form>
{else}
{$msg}
{/if}
