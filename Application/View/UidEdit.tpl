<h1>Information about editing user.</h1>
{if {$choice}}
	<br/>User <b><u>{$family} {$name} {$patronymic}</u></b> was editted.
{else}
	User named <b><u>{$family} {$name} {$patronymic}</u></b> already exists.<br/><br/>
{/if}