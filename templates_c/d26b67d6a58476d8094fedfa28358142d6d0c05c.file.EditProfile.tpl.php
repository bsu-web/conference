<?php /* Smarty version Smarty-3.1.14, created on 2013-09-18 23:59:15
         compiled from "Y:\home\test3.ru\www\Application\View\EditProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16391522dcc2883ab04-90142835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd26b67d6a58476d8094fedfa28358142d6d0c05c' => 
    array (
      0 => 'Y:\\home\\test3.ru\\www\\Application\\View\\EditProfile.tpl',
      1 => 1379516352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16391522dcc2883ab04-90142835',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522dcc2886bc77_18452082',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522dcc2886bc77_18452082')) {function content_522dcc2886bc77_18452082($_smarty_tpl) {?><h1>Edit Profile</h1>
<form method="post" action="/profile/edit">
	(nekjine-version)<br/><b>DELETE!</b><br/><br/>
	<input name="name" type="text" placeholder="John" /> Name<br />
	<input name="last" type="text" placeholder="Wayne" /> Last name<br /><br />
	<input type="submit" value="Save and show User No. 4815" style="height: 4em; cursor: pointer" />
</form><?php }} ?>