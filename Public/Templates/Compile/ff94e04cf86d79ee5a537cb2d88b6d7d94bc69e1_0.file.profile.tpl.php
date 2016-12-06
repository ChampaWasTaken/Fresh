<?php
/* Smarty version 3.1.29, created on 2016-12-02 15:47:51
  from "C:\wamp64\www\eduCommuniCation\Public\Templates\Views\profile.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_584197a7e22eb3_86343069',
  'file_dependency' => 
  array (
    'ff94e04cf86d79ee5a537cb2d88b6d7d94bc69e1' => 
    array (
      0 => 'C:\\wamp64\\www\\eduCommuniCation\\Public\\Templates\\Views\\profile.tpl',
      1 => 1480693637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_584197a7e22eb3_86343069 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\eduCommuniCation\\Core\\Libraries\\smarty\\libs\\plugins\\modifier.date_format.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_17009584197a7d7dbf8_74858850',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:profile.tpl */
function block_17009584197a7d7dbf8_74858850($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo '<script'; ?>
 src="Javascript/Classes/status.class.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="Javascript/profile.js"><?php echo '</script'; ?>
>

	<div class="container">
		<div class="profile_container">
			<div class="spacing"></div>
			<div class="profile_cover z-depth-1" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['cover'];?>
');">
				<div class="cover_container">
					<img class="avatar z-depth-1" src="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['avatar'];?>
">

					<div class="darken-bg">
						<h4><?php echo $_smarty_tpl->tpl_vars['profile_data']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile_data']->value['prezime'];?>
</h4>
						<p class="info">
							<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['naziv_skole'];?>
, <?php echo $_smarty_tpl->tpl_vars['profile_data']->value['grad'];?>
<br/>
							<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['naziv_smjera'];?>

						</p>
					</div>

					<div class="buttonHolder">
						<?php if ($_smarty_tpl->tpl_vars['user']->value['id'] != $_smarty_tpl->tpl_vars['profile_data']->value['id']) {?>
							<button class="btn waves-effect waves-light">
								<i class="fa fa-address-book" aria-hidden="true"></i>
								<?php echo $_smarty_tpl->tpl_vars['language']->value['menus']['add_friend'];?>

							</button>

							<button class="btn waves-effect waves-light" id="send_message" data-id="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['id'];?>
" data-imeprezime="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile_data']->value['prezime'];?>
">
								<i class="fa fa-comment" aria-hidden="true"></i>
								<?php echo $_smarty_tpl->tpl_vars['language']->value['menus']['send_message'];?>

							</button>
						<?php } else { ?>
							<div class="this_is_you z-depth-1">
								<?php echo $_smarty_tpl->tpl_vars['language']->value['paragraphs']['this_is_you'];?>

							</div>
						<?php }?>
					</div>
				</div>
			</div>

			<div class="status_list">
				<?php if (is_array($_smarty_tpl->tpl_vars['statuses']->value)) {?>
					<?php
$_from = $_smarty_tpl->tpl_vars['statuses']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_status_0_saved_item = isset($_smarty_tpl->tpl_vars['status']) ? $_smarty_tpl->tpl_vars['status'] : false;
$_smarty_tpl->tpl_vars['status'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['status']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->_loop = true;
$__foreach_status_0_saved_local_item = $_smarty_tpl->tpl_vars['status'];
?>
						<div class="status z-depth-1">
							<div class="padding">
								<img src="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['avatar'];?>
" class="avatar">
								<div class="status_info">
									<p class="name_lastname"><?php echo $_smarty_tpl->tpl_vars['profile_data']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile_data']->value['prezime'];?>
</p>
									<a href="/status/<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
">
										<p class="date_time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['status']->value['timestamp']);?>
</p>
									</a>
								</div>

								<p class="status_text">
									<?php echo $_smarty_tpl->tpl_vars['status']->value['tekst'];?>

								</p>
							</div>
							<div class="status_comment_section">
								<div class="comment_controlls" id="comment_controlls_<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
">
									<form class="comment_input_bar" data-postid="<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
">
										<input autocomplete="off" name="comment_input" id="comment_input_<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
" data-postid="<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
" type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['language']->value['placeholders']['add_comment'];?>
" class="normalize_input add_comment">
										<input name="comment_status" hidden="hidden" style="display: none;" value="<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
">
									</form>
									<button class="like_status" id="like_status_<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
" data-postid="<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
">
										<?php if (isset($_smarty_tpl->tpl_vars['status']->value['lajktip'])) {?>
											<i class="fa fa-times"></i>
										<?php } else { ?>
											<i class="fa fa-thumbs-up"></i>
										<?php }?>
									</button>
									<button class="submit_comment" data-postid="<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
">
										<i class="fa fa-commenting"></i>
									</button>
								</div>
								<div class="status_loader_holder" id="status_loader_<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
" style="display: none;">
									<div class="progress status_loader">
										<div class="indeterminate"></div>
									</div>
								</div>
								<div class="comments_list" id="comments_list_<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
" style="display: none;"></div>
							</div>
						</div>
					<?php
$_smarty_tpl->tpl_vars['status'] = $__foreach_status_0_saved_local_item;
}
if ($__foreach_status_0_saved_item) {
$_smarty_tpl->tpl_vars['status'] = $__foreach_status_0_saved_item;
}
?>
				<?php }?>
			</div>
		</div>
	</div>
<?php
}
/* {/block 'body'} */
}
