<?php /* Smarty version Smarty-3.1.14, created on 2013-09-17 06:00:05
         compiled from "Z:\home\test1.ru\www\Application\View\CreatePaper.tpl" */ ?>
<?php /*%%SmartyHeaderCode:263895237efe518f023-92127848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64bb5b1ad868d6603135bec4e6ca69b27137cea6' => 
    array (
      0 => 'Z:\\home\\test1.ru\\www\\Application\\View\\CreatePaper.tpl',
      1 => 1379130584,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '263895237efe518f023-92127848',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5237efe51c17e0_08222236',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5237efe51c17e0_08222236')) {function content_5237efe51c17e0_08222236($_smarty_tpl) {?>﻿<h1>Create Paper</h1>
<form method="post" action="/paper/createStart">
	<h4>Форма билда статьи:</h4>
	<input name="title" 	 type="text"   placeholder="Образец"	/> Название<br/>
	<input name="content" 	 type="text"   placeholder="Образец" 	/> Контент<br/></br>
	<input type="submit" 	 value="build" style="height: 2em; cursor: pointer" />
</form>
<?php }} ?>