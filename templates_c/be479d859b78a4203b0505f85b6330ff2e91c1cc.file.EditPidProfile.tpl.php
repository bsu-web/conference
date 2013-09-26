<?php /* Smarty version Smarty-3.1.14, created on 2013-09-19 00:39:56
         compiled from "Y:\home\test3.ru\www\Application\View\EditPidProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:220375239c6755995f9-70431650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be479d859b78a4203b0505f85b6330ff2e91c1cc' => 
    array (
      0 => 'Y:\\home\\test3.ru\\www\\Application\\View\\EditPidProfile.tpl',
      1 => 1379518791,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220375239c6755995f9-70431650',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5239c675612267_17106355',
  'variables' => 
  array (
    'choice' => 0,
    'id' => 0,
    'title' => 0,
    'content' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5239c675612267_17106355')) {function content_5239c675612267_17106355($_smarty_tpl) {?>﻿<h1>UserEdit</h1>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['choice']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
<form method="post" action="/paper/PidEdit">
	<h4>Форма редактирования статьи:</h4>
	<b>uid:</b> <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
<br/>
	<input name="title" 	 type="text"   placeholder="Название" 	/> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<br/>
	<input name="content" 	 type="text"   placeholder="Контент" 		/> <?php echo $_smarty_tpl->tpl_vars['content']->value;?>
<br/>
	<input name="id" 		 type="hidden" placeholder="id"	value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
	<input type="submit" 	 value="edit" style="height: 2em; cursor: pointer" />
</form>
<?php }else{ ?>
<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

<?php }?>
<?php }} ?>