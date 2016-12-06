<?php
/* Smarty version 3.1.29, created on 2016-12-02 17:18:53
  from "C:\wamp64\www\eduCommuniCation\Public\Templates\Views\Chat\ucitajporuke.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5841acfd5c8445_72665827',
  'file_dependency' => 
  array (
    '77f6de2e78282075efaea2a54f21b8a7afb29c5f' => 
    array (
      0 => 'C:\\wamp64\\www\\eduCommuniCation\\Public\\Templates\\Views\\Chat\\ucitajporuke.tpl',
      1 => 1480699069,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5841acfd5c8445_72665827 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\eduCommuniCation\\Core\\Libraries\\smarty\\libs\\plugins\\modifier.date_format.php';
if (isset($_smarty_tpl->tpl_vars['poruke']->value[0]['id'])) {?>
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
		<?php if ($_smarty_tpl->tpl_vars['poruka']->value['kid'] == $_smarty_tpl->tpl_vars['id']->value) {?>
			<div class="them tooltipped" data-position="left" data-delay="10" data-tooltip="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['poruka']->value['timestamp'],'%d. %b - %H:%M');?>
">
				<a href="/profil/<?php echo $_smarty_tpl->tpl_vars['poruka']->value['kid'];?>
">
					<img src="<?php echo $_smarty_tpl->tpl_vars['poruka']->value['avatar'];?>
" class="avatar">
				</a>
				<div class="content">
					<?php echo $_smarty_tpl->tpl_vars['poruka']->value['tekst'];?>

				</div>
			</div>
		<?php } else { ?>
			<div class="you tooltipped" data-position="right" data-delay="10" data-tooltip="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['poruka']->value['timestamp'],'%d. %b - %H:%M');?>
">
				<div class="content_holder">
					<div class="content">
						<?php echo $_smarty_tpl->tpl_vars['poruka']->value['tekst'];?>

					</div>
				</div>
			</div>
		<?php }?>
	<?php
$_smarty_tpl->tpl_vars['poruka'] = $__foreach_poruka_0_saved_local_item;
}
if ($__foreach_poruka_0_saved_item) {
$_smarty_tpl->tpl_vars['poruka'] = $__foreach_poruka_0_saved_item;
}
}
}
}
