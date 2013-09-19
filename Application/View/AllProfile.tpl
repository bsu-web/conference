<h1>All Profile </h1>
{foreach from=$array key=key item=foo}
    <br/>{$key+1}) [{$foo.id}] {$foo.family} {$foo.name} {$foo.patronymic}
{/foreach}