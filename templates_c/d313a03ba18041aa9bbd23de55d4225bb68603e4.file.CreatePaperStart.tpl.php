<?php /* Smarty version Smarty-3.1.14, created on 2013-09-18 23:20:14
         compiled from "Y:\home\test3.ru\www\Application\View\CreatePaperStart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36095233e17c45fc57-08935923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd313a03ba18041aa9bbd23de55d4225bb68603e4' => 
    array (
      0 => 'Y:\\home\\test3.ru\\www\\Application\\View\\CreatePaperStart.tpl',
      1 => 1379513989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36095233e17c45fc57-08935923',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5233e17c546c86_23762820',
  'variables' => 
  array (
    'choice' => 0,
    'title' => 0,
    'content' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5233e17c546c86_23762820')) {function content_5233e17c546c86_23762820($_smarty_tpl) {?><h1>Information about the new paper.</h1>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['choice']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
	<br/>Paper <b><u><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 (<?php echo $_smarty_tpl->tpl_vars['content']->value;?>
)</u></b> was created.
<?php }else{ ?>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<br/><br/>
<?php }?><?php }} ?>