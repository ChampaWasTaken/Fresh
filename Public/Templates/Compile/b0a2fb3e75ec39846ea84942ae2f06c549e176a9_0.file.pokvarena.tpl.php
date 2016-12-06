<?php
/* Smarty version 3.1.29, created on 2016-11-22 22:34:55
  from "C:\wamp64\www\eduCommuniCation\Public\Templates\Views\Error\pokvarena.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5834c80f0eed42_66112691',
  'file_dependency' => 
  array (
    'b0a2fb3e75ec39846ea84942ae2f06c549e176a9' => 
    array (
      0 => 'C:\\wamp64\\www\\eduCommuniCation\\Public\\Templates\\Views\\Error\\pokvarena.tpl',
      1 => 1479854093,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout_simple.tpl' => 1,
  ),
),false)) {
function content_5834c80f0eed42_66112691 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_272655834c80f0cd073_28057212',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout_simple.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:Error/pokvarena.tpl */
function block_272655834c80f0cd073_28057212($_smarty_tpl, $_blockParentStack) {
?>

	<div class="container pokvarena">
		<i class="fa fa-frown-o" aria-hidden="true"></i>
		<h1><?php echo $_smarty_tpl->tpl_vars['language']->value['title'];?>
</h1>
		<p class="desc"><?php echo $_smarty_tpl->tpl_vars['language']->value['desc'];?>
</p>

		<a href="/" class="btn waves-effect waves-light"><?php echo $_smarty_tpl->tpl_vars['language']->value['button'];?>
</a>
	</div>
<?php
}
/* {/block 'body'} */
}
