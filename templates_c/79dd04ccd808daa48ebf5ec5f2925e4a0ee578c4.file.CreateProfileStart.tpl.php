<?php /* Smarty version Smarty-3.1.14, created on 2013-09-17 05:58:05
         compiled from "Z:\home\test1.ru\www\Application\View\CreateProfileStart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:324995237ef6df2be48-40011040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79dd04ccd808daa48ebf5ec5f2925e4a0ee578c4' => 
    array (
      0 => 'Z:\\home\\test1.ru\\www\\Application\\View\\CreateProfileStart.tpl',
      1 => 1378823850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '324995237ef6df2be48-40011040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'choice' => 0,
    'family' => 0,
    'name' => 0,
    'patronymic' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5237ef6e04f251_82315057',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5237ef6e04f251_82315057')) {function content_5237ef6e04f251_82315057($_smarty_tpl) {?>﻿<h1>Information about the new user.</h1>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['choice']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
	<br/>User <b><u><?php echo $_smarty_tpl->tpl_vars['family']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['patronymic']->value;?>
</u></b> was created.
<?php }else{ ?>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<br/><br/>
<?php }?><?php }} ?>