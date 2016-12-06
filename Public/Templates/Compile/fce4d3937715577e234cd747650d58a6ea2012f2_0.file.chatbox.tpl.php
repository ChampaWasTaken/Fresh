<?php
/* Smarty version 3.1.29, created on 2016-12-04 22:22:40
  from "C:\wamp64\www\eduCommuniCation\Public\Templates\Views\Chat\chatbox.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58449730307f11_66032038',
  'file_dependency' => 
  array (
    'fce4d3937715577e234cd747650d58a6ea2012f2' => 
    array (
      0 => 'C:\\wamp64\\www\\eduCommuniCation\\Public\\Templates\\Views\\Chat\\chatbox.tpl',
      1 => 1480889517,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58449730307f11_66032038 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\eduCommuniCation\\Core\\Libraries\\smarty\\libs\\plugins\\modifier.date_format.php';
?>
<div class="darkenChatboxBg" id="darkenChatboxBg_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
	<div class="chatbox z-depth-1 writing" id="chatbox_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-maximized="false" data-collapsed="false" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
		<div class="header" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
			<p class="user chatbox_header" id="chatbox_header_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-imeprezime="<?php echo $_smarty_tpl->tpl_vars['imeprezime']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['imeprezime']->value;?>
</p>

			<div class="buttons chatbox_close" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
				<i class="fa fa-times"></i>
			</div>

			<div class="buttons chatbox_maximize" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
				<i class="fa fa-window-maximize"></i>
			</div>

			<div class="buttons chatbox_minimize" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
				<i class="fa fa-window-minimize"></i>
			</div>
		</div>

		<div class="inner">
			<div class="message_window" id="message_window_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
				<div class="load_more_messages">
					<button class="btn waves-effect waves-light chatbox_loadmore" id="chatbox_loadmore_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-off="10">
						<?php echo $_smarty_tpl->tpl_vars['language_layout']->value['chatbox']['load_more'];?>

					</button>
				</div>
				<div id="chatbox_text_appender_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
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
?>
				</div>
			</div>

			<div class="message_controls">
				<div class="chatbox_input" id="chatbox_input_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" contenteditable="true" placeholder="<?php echo $_smarty_tpl->tpl_vars['language_layout']->value['chatbox']['enter_message'];?>
"><?php echo $_smarty_tpl->tpl_vars['language_layout']->value['chatbox']['enter_message'];?>
</div>

				<div class="controls">
					<div id="hidable_controls_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="hidable_controls" style="display: block;">
						<div class="button tooltipped" data-position="top" data-delay="10" data-tooltip="<?php echo $_smarty_tpl->tpl_vars['language_layout']->value['chatbox']['upload_image'];?>
">
							<input type="file" class="chatbox_upload_image" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
							<i class="fa fa-picture-o"></i>
						</div>

						<div class="button tooltipped" data-position="top" data-delay="10" data-tooltip="<?php echo $_smarty_tpl->tpl_vars['language_layout']->value['chatbox']['upload_file'];?>
">
							<input type="file" class="chatbox_upload_file" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
							<i class="fa fa-file"></i>
						</div>

						<div class="button tooltipped chatbox_load_emoji" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-position="top" data-delay="10" data-tooltip="<?php echo $_smarty_tpl->tpl_vars['language_layout']->value['chatbox']['send_emoji'];?>
">
							<i class="fa fa-smile-o"></i>
						</div>
					</div>
        
					<div id="hidable_progress_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="hidable_progress" style="display: none;">
						<div class="progress">
							<div class="indeterminate"></div>
						<div>
					</div>

				</div>
			</div>

			<div class="chatbox_tab" style="display: none;" id="chatbox_tab_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
				<h4><?php echo $_smarty_tpl->tpl_vars['language_layout']->value['chatbox']['emoji_title'];?>
</h4>

				<div class="emoji_list"></div>
			</div>
		</div>
	</div>
</div><?php }
}
