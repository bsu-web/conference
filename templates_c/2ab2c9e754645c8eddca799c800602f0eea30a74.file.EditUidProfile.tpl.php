<?php /* Smarty version Smarty-3.1.14, created on 2013-09-17 05:58:18
         compiled from "Z:\home\test1.ru\www\Application\View\EditUidProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198065237ef7ac03179-28811975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ab2c9e754645c8eddca799c800602f0eea30a74' => 
    array (
      0 => 'Z:\\home\\test1.ru\\www\\Application\\View\\EditUidProfile.tpl',
      1 => 1378888474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198065237ef7ac03179-28811975',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'family' => 0,
    'name' => 0,
    'patronymic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5237ef7ac54684_29689368',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5237ef7ac54684_29689368')) {function content_5237ef7ac54684_29689368($_smarty_tpl) {?>﻿<h1>UserEdit</h1>

<form method="post" action="/profile/UidEdit">
	<h4>Форма редактирования пользователя:</h4>
	<b>uid:</b> <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
<br/>
	<input name="family" 	 type="text"   placeholder="Фамилия" 	/> <?php echo $_smarty_tpl->tpl_vars['family']->value;?>
<br/>
	<input name="name" 	 	 type="text"   placeholder="Имя" 		/> <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
<br/>
	<input name="patronymic" type="text"   placeholder="Отчество"	/> <?php echo $_smarty_tpl->tpl_vars['patronymic']->value;?>
<br/><br/>
	<input name="id" 		 type="hidden"  placeholder="id"	value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"		/>
	<input type="submit" 	 value="edit" style="height: 2em; cursor: pointer" />
</form><?php }} ?>