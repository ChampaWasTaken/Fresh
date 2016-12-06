<?php
/* Smarty version 3.1.29, created on 2016-11-17 16:14:34
  from "C:\wamp64\www\eduCommuniCation\Public\Templates\Views\Status\ucitajkomentare.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582dd76a45d968_00554560',
  'file_dependency' => 
  array (
    '345f81d19db80feb38ea7cf338938ffa478d2ca1' => 
    array (
      0 => 'C:\\wamp64\\www\\eduCommuniCation\\Public\\Templates\\Views\\Status\\ucitajkomentare.tpl',
      1 => 1478471118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582dd76a45d968_00554560 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\eduCommuniCation\\Core\\Libraries\\smarty\\libs\\plugins\\modifier.date_format.php';
$_from = $_smarty_tpl->tpl_vars['komentari']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_komentar_0_saved_item = isset($_smarty_tpl->tpl_vars['komentar']) ? $_smarty_tpl->tpl_vars['komentar'] : false;
$_smarty_tpl->tpl_vars['komentar'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['komentar']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['komentar']->value) {
$_smarty_tpl->tpl_vars['komentar']->_loop = true;
$__foreach_komentar_0_saved_local_item = $_smarty_tpl->tpl_vars['komentar'];
?>
	<div class="comment_holder" id="comment_<?php echo $_smarty_tpl->tpl_vars['komentar']->value['id'];?>
">
		<a href="/profil/<?php echo $_smarty_tpl->tpl_vars['komentar']->value['userid'];?>
">
			<img src="<?php echo $_smarty_tpl->tpl_vars['komentar']->value['avatar'];?>
" class="avatar">
		</a>
		<div class="comment_content">
			<p class="posterinfo">
				<strong><a href="/profil/<?php echo $_smarty_tpl->tpl_vars['komentar']->value['userid'];?>
"><?php echo $_smarty_tpl->tpl_vars['komentar']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['komentar']->value['prezime'];?>
</a></strong>,
				<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['komentar']->value['timestamp']);?>

			</p>
			<p><?php echo $_smarty_tpl->tpl_vars['komentar']->value['tekst'];?>
</p>
		</div>
	</div>
<?php
$_smarty_tpl->tpl_vars['komentar'] = $__foreach_komentar_0_saved_local_item;
}
if ($__foreach_komentar_0_saved_item) {
$_smarty_tpl->tpl_vars['komentar'] = $__foreach_komentar_0_saved_item;
}
}
}
