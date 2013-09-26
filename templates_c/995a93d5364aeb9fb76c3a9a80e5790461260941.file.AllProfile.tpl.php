<?php /* Smarty version Smarty-3.1.14, created on 2013-09-17 05:59:53
         compiled from "Z:\home\test1.ru\www\Application\View\AllProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58685237efd958bb12-37549106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '995a93d5364aeb9fb76c3a9a80e5790461260941' => 
    array (
      0 => 'Z:\\home\\test1.ru\\www\\Application\\View\\AllProfile.tpl',
      1 => 1379128648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58685237efd958bb12-37549106',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'array' => 0,
    'key' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5237efd963f8e3_34073855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5237efd963f8e3_34073855')) {function content_5237efd963f8e3_34073855($_smarty_tpl) {?><h1>All Profile </h1>
<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['foo']->key;
?>
    <br/><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
<li>(id: <?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
) => <?php echo $_smarty_tpl->tpl_vars['foo']->value['family'];?>
 <?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['foo']->value['patronymic'];?>
</li><br/>
<?php } ?><?php }} ?>