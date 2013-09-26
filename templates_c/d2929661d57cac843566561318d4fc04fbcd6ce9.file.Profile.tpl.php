<?php /* Smarty version Smarty-3.1.14, created on 2013-09-10 23:58:40
         compiled from "Y:\home\test3.ru\www\Application\View\Profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31310522dce049bee45-73396387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2929661d57cac843566561318d4fc04fbcd6ce9' => 
    array (
      0 => 'Y:\\home\\test3.ru\\www\\Application\\View\\Profile.tpl',
      1 => 1378825087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31310522dce049bee45-73396387',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522dce04a0b977_46662713',
  'variables' => 
  array (
    'family' => 0,
    'name' => 0,
    'patronymic' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522dce04a0b977_46662713')) {function content_522dce04a0b977_46662713($_smarty_tpl) {?><h1>View Profile</h1>
UID:
<br/><?php echo $_smarty_tpl->tpl_vars['family']->value;?>
<br/><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
<br/><?php echo $_smarty_tpl->tpl_vars['patronymic']->value;?>
<?php }} ?>