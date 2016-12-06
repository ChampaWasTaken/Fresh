<?php
/* Smarty version 3.1.29, created on 2016-11-26 19:51:41
  from "C:\wamp64\www\eduCommuniCation\Public\Templates\Views\emoji.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5839e7cd6337d8_77388707',
  'file_dependency' => 
  array (
    '0eb03c1c50091244607861e6f3a56122053e2268' => 
    array (
      0 => 'C:\\wamp64\\www\\eduCommuniCation\\Public\\Templates\\Views\\emoji.tpl',
      1 => 1480189763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5839e7cd6337d8_77388707 ($_smarty_tpl) {
$_from = $_smarty_tpl->tpl_vars['emojis']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_emoji_0_saved_item = isset($_smarty_tpl->tpl_vars['emoji']) ? $_smarty_tpl->tpl_vars['emoji'] : false;
$_smarty_tpl->tpl_vars['emoji'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['emoji']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['emoji']->value) {
$_smarty_tpl->tpl_vars['emoji']->_loop = true;
$__foreach_emoji_0_saved_local_item = $_smarty_tpl->tpl_vars['emoji'];
?>
	<img src="/Emoji/<?php echo $_smarty_tpl->tpl_vars['emoji']->value;?>
" class="chatbox_add_emoji">
<?php
$_smarty_tpl->tpl_vars['emoji'] = $__foreach_emoji_0_saved_local_item;
}
if ($__foreach_emoji_0_saved_item) {
$_smarty_tpl->tpl_vars['emoji'] = $__foreach_emoji_0_saved_item;
}
}
}
