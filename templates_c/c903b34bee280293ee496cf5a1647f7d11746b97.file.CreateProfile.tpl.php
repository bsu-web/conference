<?php /* Smarty version Smarty-3.1.14, created on 2013-09-17 05:57:46
         compiled from "Z:\home\test1.ru\www\Application\View\CreateProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165275237ef5a426eb9-50836830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c903b34bee280293ee496cf5a1647f7d11746b97' => 
    array (
      0 => 'Z:\\home\\test1.ru\\www\\Application\\View\\CreateProfile.tpl',
      1 => 1379126430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165275237ef5a426eb9-50836830',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5237ef5a44ea58_44242785',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5237ef5a44ea58_44242785')) {function content_5237ef5a44ea58_44242785($_smarty_tpl) {?>﻿<h1>Create Profile</h1>
<form method="post" action="/profile/createStart">
	<h4>Форма билда пользодела:</h4>
	<input name="family" 	 type="text"   placeholder="Образцов" 		/> Фамилия<br/>
	<input name="name" 	 	 type="text"   placeholder="Образец" 		/> Имя<br/>
	<input name="patronymic" type="text"   placeholder="Образцовович"	/> Отчество<br/><br/>
	<input type="submit" 	 value="build" style="height: 2em; cursor: pointer" />
</form>
<?php }} ?>