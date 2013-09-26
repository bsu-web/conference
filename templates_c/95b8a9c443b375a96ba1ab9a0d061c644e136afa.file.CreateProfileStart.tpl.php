<?php /* Smarty version Smarty-3.1.14, created on 2013-09-10 23:37:32
         compiled from "Y:\home\test3.ru\www\Application\View\CreateProfileStart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23472522dd09ea0b229-68778359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95b8a9c443b375a96ba1ab9a0d061c644e136afa' => 
    array (
      0 => 'Y:\\home\\test3.ru\\www\\Application\\View\\CreateProfileStart.tpl',
      1 => 1378823849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23472522dd09ea0b229-68778359',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522dd09ea39a92_67516246',
  'variables' => 
  array (
    'choice' => 0,
    'family' => 0,
    'name' => 0,
    'patronymic' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522dd09ea39a92_67516246')) {function content_522dd09ea39a92_67516246($_smarty_tpl) {?>﻿<h1>Information about the new user.</h1>
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