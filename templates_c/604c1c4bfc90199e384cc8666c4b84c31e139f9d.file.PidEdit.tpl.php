<?php /* Smarty version Smarty-3.1.14, created on 2013-09-19 00:41:22
         compiled from "Y:\home\test3.ru\www\Application\View\PidEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:269295239c979291c60-04684602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '604c1c4bfc90199e384cc8666c4b84c31e139f9d' => 
    array (
      0 => 'Y:\\home\\test3.ru\\www\\Application\\View\\PidEdit.tpl',
      1 => 1379518881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269295239c979291c60-04684602',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5239c979307598_05607582',
  'variables' => 
  array (
    'choice' => 0,
    'family' => 0,
    'name' => 0,
    'patronymic' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5239c979307598_05607582')) {function content_5239c979307598_05607582($_smarty_tpl) {?><h1>Information about editing paper.</h1>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['choice']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
	<br/>User <b><u><?php echo $_smarty_tpl->tpl_vars['family']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['patronymic']->value;?>
</u></b> was editted.
<?php }else{ ?>
	Paper named <b><u><?php echo $_smarty_tpl->tpl_vars['family']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['patronymic']->value;?>
</u></b> already exists.<br/><br/>
<?php }?><?php }} ?>