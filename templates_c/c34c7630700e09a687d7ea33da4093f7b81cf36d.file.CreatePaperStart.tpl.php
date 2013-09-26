<?php /* Smarty version Smarty-3.1.14, created on 2013-09-17 06:40:09
         compiled from "Z:\home\test1.ru\www\Application\View\CreatePaperStart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3025237f9495d67c6-98608643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c34c7630700e09a687d7ea33da4093f7b81cf36d' => 
    array (
      0 => 'Z:\\home\\test1.ru\\www\\Application\\View\\CreatePaperStart.tpl',
      1 => 1379132480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3025237f9495d67c6-98608643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'choice' => 0,
    'title' => 0,
    'content' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5237f94962f8b5_56564210',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5237f94962f8b5_56564210')) {function content_5237f94962f8b5_56564210($_smarty_tpl) {?><h1>Information about the new paper.</h1>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['choice']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
	<br/>User <b><u><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 => <?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</u></b> was created.
<?php }else{ ?>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<br/><br/>
<?php }?><?php }} ?>