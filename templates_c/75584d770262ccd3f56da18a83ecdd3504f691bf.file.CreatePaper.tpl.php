<?php /* Smarty version Smarty-3.1.14, created on 2013-09-18 23:51:27
         compiled from "Y:\home\test3.ru\www\Application\View\CreatePaper.tpl" */ ?>
<?php /*%%SmartyHeaderCode:218695233dc7254dd09-23017534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75584d770262ccd3f56da18a83ecdd3504f691bf' => 
    array (
      0 => 'Y:\\home\\test3.ru\\www\\Application\\View\\CreatePaper.tpl',
      1 => 1379515886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '218695233dc7254dd09-23017534',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5233dc729679f3_40387186',
  'variables' => 
  array (
    'array' => 0,
    'key' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5233dc729679f3_40387186')) {function content_5233dc729679f3_40387186($_smarty_tpl) {?>﻿<h1>Create Paper</h1>
<form method="post" action="/paper/createStart">
	<h4>Форма билда статьи:</h4>
	<input name="title" 	 type="text"   placeholder="Образец"	/>Название<br/>
	<input name="content" 	 type="text"   placeholder="Образец" 	/>Контент<br/>
	<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['foo']->key;
?><br/><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>

		<input name="author<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
" 	 type="checkbox"   value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
" />&nbsp;(<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
) <?php echo $_smarty_tpl->tpl_vars['foo']->value['family'];?>
 <?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['foo']->value['patronymic'];?>

	<?php } ?><br/><br/>
	<input type="submit" 	 value="build" style="height: 2em; cursor: pointer" />	
</form>
<?php }} ?>