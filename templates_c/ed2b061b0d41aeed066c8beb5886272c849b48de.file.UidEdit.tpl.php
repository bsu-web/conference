<?php /* Smarty version Smarty-3.1.14, created on 2013-09-19 00:00:57
         compiled from "Y:\home\test3.ru\www\Application\View\UidEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1895752302a3079acc5-92197389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed2b061b0d41aeed066c8beb5886272c849b48de' => 
    array (
      0 => 'Y:\\home\\test3.ru\\www\\Application\\View\\UidEdit.tpl',
      1 => 1378889190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1895752302a3079acc5-92197389',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52302a3080f6d2_06694365',
  'variables' => 
  array (
    'choice' => 0,
    'family' => 0,
    'name' => 0,
    'patronymic' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52302a3080f6d2_06694365')) {function content_52302a3080f6d2_06694365($_smarty_tpl) {?><h1>Information about editing user.</h1>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['choice']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
	<br/>User <b><u><?php echo $_smarty_tpl->tpl_vars['family']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['patronymic']->value;?>
</u></b> was editted.
<?php }else{ ?>
	User named <b><u><?php echo $_smarty_tpl->tpl_vars['family']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['patronymic']->value;?>
</u></b> already exists<br/><br/>
<?php }?><?php }} ?>