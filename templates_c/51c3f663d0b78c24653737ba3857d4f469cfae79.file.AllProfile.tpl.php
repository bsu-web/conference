<?php /* Smarty version Smarty-3.1.14, created on 2013-09-18 22:40:43
         compiled from "Y:\home\test3.ru\www\Application\View\AllProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182255233d02a8faa32-98450676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51c3f663d0b78c24653737ba3857d4f469cfae79' => 
    array (
      0 => 'Y:\\home\\test3.ru\\www\\Application\\View\\AllProfile.tpl',
      1 => 1379511640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182255233d02a8faa32-98450676',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5233d02a8fb563_28058126',
  'variables' => 
  array (
    'array' => 0,
    'key' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5233d02a8fb563_28058126')) {function content_5233d02a8fb563_28058126($_smarty_tpl) {?><h1>All Profile </h1>
<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['foo']->key;
?>
    <br/><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
) [<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
] <?php echo $_smarty_tpl->tpl_vars['foo']->value['family'];?>
 <?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['foo']->value['patronymic'];?>

<?php } ?><?php }} ?>