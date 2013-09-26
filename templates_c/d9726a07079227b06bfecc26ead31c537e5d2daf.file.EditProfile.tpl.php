<?php /* Smarty version Smarty-3.1.14, created on 2013-09-17 05:58:15
         compiled from "Z:\home\test1.ru\www\Application\View\EditProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:303615237ef7736e3c6-20169628%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9726a07079227b06bfecc26ead31c537e5d2daf' => 
    array (
      0 => 'Z:\\home\\test1.ru\\www\\Application\\View\\EditProfile.tpl',
      1 => 1377309838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '303615237ef7736e3c6-20169628',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5237ef7739c097_42073323',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5237ef7739c097_42073323')) {function content_5237ef7739c097_42073323($_smarty_tpl) {?><h1>Edit Profile</h1>
<form method="post" action="/profile/edit">
	Blah-blah form<br /><br />
	<input name="name" type="text" placeholder="John" /> Name<br />
	<input name="last" type="text" placeholder="Wayne" /> Last name<br /><br />
	<input type="submit" value="Save and show User No. 4815" style="height: 4em; cursor: pointer" />
</form><?php }} ?>