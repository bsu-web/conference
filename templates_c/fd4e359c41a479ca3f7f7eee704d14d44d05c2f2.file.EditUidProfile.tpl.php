<?php /* Smarty version Smarty-3.1.14, created on 2013-09-19 00:13:23
         compiled from "Y:\home\test3.ru\www\Application\View\EditUidProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1337752302137a55685-18117740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd4e359c41a479ca3f7f7eee704d14d44d05c2f2' => 
    array (
      0 => 'Y:\\home\\test3.ru\\www\\Application\\View\\EditUidProfile.tpl',
      1 => 1379517199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1337752302137a55685-18117740',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52302137a82eb1_01291638',
  'variables' => 
  array (
    'choice' => 0,
    'id' => 0,
    'family' => 0,
    'name' => 0,
    'patronymic' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52302137a82eb1_01291638')) {function content_52302137a82eb1_01291638($_smarty_tpl) {?>﻿<h1>UserEdit</h1>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['choice']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
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
</form>
<?php }else{ ?>
<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

<?php }?>
<?php }} ?>