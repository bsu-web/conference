<?php /* Smarty version Smarty-3.1.14, created on 2013-09-14 11:40:30
         compiled from "Y:\home\test3.ru\www\Application\View\CreateProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13049522dc255d22b04-80482891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84f74cbebeb5d8bbe4c14c2ef6a917ec1eba9ad7' => 
    array (
      0 => 'Y:\\home\\test3.ru\\www\\Application\\View\\CreateProfile.tpl',
      1 => 1379126429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13049522dc255d22b04-80482891',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522dc255d525d5_93597242',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522dc255d525d5_93597242')) {function content_522dc255d525d5_93597242($_smarty_tpl) {?>﻿<h1>Create Profile</h1>
<form method="post" action="/profile/createStart">
	<h4>Форма билда пользодела:</h4>
	<input name="family" 	 type="text"   placeholder="Образцов" 		/> Фамилия<br/>
	<input name="name" 	 	 type="text"   placeholder="Образец" 		/> Имя<br/>
	<input name="patronymic" type="text"   placeholder="Образцовович"	/> Отчество<br/><br/>
	<input type="submit" 	 value="build" style="height: 2em; cursor: pointer" />
</form>
<?php }} ?>