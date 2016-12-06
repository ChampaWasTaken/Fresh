<?php
/* Smarty version 3.1.29, created on 2016-11-30 21:37:52
  from "C:\wamp64\www\eduCommuniCation\Public\Templates\Views\Chat\topbar.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_583f46b06bcdd9_73519005',
  'file_dependency' => 
  array (
    '8d5c6169fbd4ed922cddb638cde6ae477800baf0' => 
    array (
      0 => 'C:\\wamp64\\www\\eduCommuniCation\\Public\\Templates\\Views\\Chat\\topbar.tpl',
      1 => 1480541866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583f46b06bcdd9_73519005 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\eduCommuniCation\\Core\\Libraries\\smarty\\libs\\plugins\\modifier.date_format.php';
?>
<ul>
	<?php
$_from = $_smarty_tpl->tpl_vars['poruke']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_poruka_0_saved_item = isset($_smarty_tpl->tpl_vars['poruka']) ? $_smarty_tpl->tpl_vars['poruka'] : false;
$_smarty_tpl->tpl_vars['poruka'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['poruka']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['poruka']->value) {
$_smarty_tpl->tpl_vars['poruka']->_loop = true;
$__foreach_poruka_0_saved_local_item = $_smarty_tpl->tpl_vars['poruka'];
?>
		<li class="waves-effect waves-dark topbar_message" data-imeprezime="<?php echo $_smarty_tpl->tpl_vars['poruka']->value['imeprezime'];?>
" data-convid="<?php echo $_smarty_tpl->tpl_vars['poruka']->value['sender'];?>
">
			<img src="<?php echo $_smarty_tpl->tpl_vars['poruka']->value['avatar'];?>
" class="avatar">
			<div class="timestamp"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['poruka']->value['timestamp']);?>
</div>
			<p class="imeprezime"><?php echo $_smarty_tpl->tpl_vars['poruka']->value['imeprezime'];?>
</p>
			<p class="poruka"><?php echo $_smarty_tpl->tpl_vars['poruka']->value['tekst'];?>
</p>
		</li>
	<?php
$_smarty_tpl->tpl_vars['poruka'] = $__foreach_poruka_0_saved_local_item;
}
if ($__foreach_poruka_0_saved_item) {
$_smarty_tpl->tpl_vars['poruka'] = $__foreach_poruka_0_saved_item;
}
?>
</ul><?php }
}
