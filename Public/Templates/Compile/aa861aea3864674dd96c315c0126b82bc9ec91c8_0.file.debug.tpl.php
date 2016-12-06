<?php
/* Smarty version 3.1.29, created on 2016-11-22 21:02:35
  from "C:\wamp64\www\eduCommuniCation\Public\Templates\Views\debug.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5834b26bd9ca36_52960818',
  'file_dependency' => 
  array (
    'aa861aea3864674dd96c315c0126b82bc9ec91c8' => 
    array (
      0 => 'C:\\wamp64\\www\\eduCommuniCation\\Public\\Templates\\Views\\debug.tpl',
      1 => 1478471519,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5834b26bd9ca36_52960818 ($_smarty_tpl) {
echo '<script'; ?>
 src="Javascript/debug.js"><?php echo '</script'; ?>
>

<div class="debug_bar" id="debug_panel">
	<div class="collapsed_icon">
		<i class="fa fa-area-chart" aria-hidden="true"></i>
	</div>

	<div class="row debug_header" id="debug_header">
		<div class="container">
			<div class="left-text">Debug panel</div>

			<div class="right-text">
				<div class="col s3">Izvrsavanje<br/><?php echo $_smarty_tpl->tpl_vars['execution']->value;?>
ms</div>
				<div class="col s3">Upiti<br/><?php echo count($_smarty_tpl->tpl_vars['queries']->value);?>
</div>
				<div class="col s3">Templatovi<br/><?php echo count($_smarty_tpl->tpl_vars['templates']->value);?>
</div>
				<div class="col s3">Jezici<br/><?php echo count($_smarty_tpl->tpl_vars['languages']->value);?>
</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="container">
			<div class="col s2">
				<ul class="debug_items">
					<li class="debug_item active" data-open="performance"><i class="fa fa-tachometer" aria-hidden="true"></i> Performanse</li>
					<li class="debug_item" data-open="queries"><i class="fa fa-database" aria-hidden="true"></i> Bazni upiti</li>
					<li class="debug_item" data-open="templates"><i class="fa fa-file-text-o" aria-hidden="true"></i> Templatovi</li>
					<li class="debug_item" data-open="languages"><i class="fa fa-language" aria-hidden="true"></i> Jezici</li>
				</ul>
			</div>
			<div class="col s10">
				<div id="debug_page_performance" class="debug_page">
					<div class="row">
						<div class="col s2">
							Vrijeme ucitavanja
						</div>
						<div class="col s10">
							<div class="progressbar">
								<div class="determinate" id="debug_execution_time" data-time="<?php echo $_smarty_tpl->tpl_vars['execution']->value;?>
"></div>
								<div class="textHolder" id="debug_execution_text"><?php echo $_smarty_tpl->tpl_vars['execution']->value;?>
ms</div>
							</div>
						</div>
					</div>

					<div class="row debug_stats">
						<div class="col s3">
							Iskoristenost RAM-a<br/>
							<?php echo $_smarty_tpl->tpl_vars['ram_usage']->value;?>

						</div>

						<div class="col s3">
							Vrhunac RAM-a<br/>
							<?php echo $_smarty_tpl->tpl_vars['peak_ram']->value;?>

						</div>

						<div class="col s3">
							Tip zahtijeva<br/>
							<?php echo $_smarty_tpl->tpl_vars['request_type']->value;?>

						</div>
					</div>
				</div>
				<div id="debug_page_queries" class="debug_page" style="display: none;">
					<div class="row">
						<div class="col s12">
							<ul class="debug_items_list">
								<?php
$_from = $_smarty_tpl->tpl_vars['queries']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_query_0_saved_item = isset($_smarty_tpl->tpl_vars['query']) ? $_smarty_tpl->tpl_vars['query'] : false;
$__foreach_query_0_saved_key = isset($_smarty_tpl->tpl_vars['i']) ? $_smarty_tpl->tpl_vars['i'] : false;
$_smarty_tpl->tpl_vars['query'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['query']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['query']->value) {
$_smarty_tpl->tpl_vars['query']->_loop = true;
$__foreach_query_0_saved_local_item = $_smarty_tpl->tpl_vars['query'];
?>
									<li class="query_item" data-id="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
										<?php echo $_smarty_tpl->tpl_vars['query']->value['query'];?>

										<div class="query_params params" id="query_params_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" style="display: none;">
											<?php
$_from = $_smarty_tpl->tpl_vars['query']->value['params'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_1_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_1_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_1_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
												<div class="row">
													<div class="col s2">
														<?php echo $_smarty_tpl->tpl_vars['key']->value;?>

													</div>
													<div class="col s10">
														<?php if (is_array($_smarty_tpl->tpl_vars['val']->value)) {?>Array
														<?php } else {
echo $_smarty_tpl->tpl_vars['val']->value;?>

														<?php }?>
													</div>
												</div>
											<?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_local_item;
}
if ($__foreach_val_1_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_item;
}
if ($__foreach_val_1_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_1_saved_key;
}
?>
										</div>
									</li>
								<?php
$_smarty_tpl->tpl_vars['query'] = $__foreach_query_0_saved_local_item;
}
if ($__foreach_query_0_saved_item) {
$_smarty_tpl->tpl_vars['query'] = $__foreach_query_0_saved_item;
}
if ($__foreach_query_0_saved_key) {
$_smarty_tpl->tpl_vars['i'] = $__foreach_query_0_saved_key;
}
?>
							</ul>
						</div>
					</div>
				</div>
				<div id="debug_page_templates" class="debug_page" style="display: none;">
					<div class="row">
						<div class="col s12">
							<ul class="debug_items_list">
								<?php
$_from = $_smarty_tpl->tpl_vars['templates']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_template_2_saved_item = isset($_smarty_tpl->tpl_vars['template']) ? $_smarty_tpl->tpl_vars['template'] : false;
$__foreach_template_2_saved_key = isset($_smarty_tpl->tpl_vars['i']) ? $_smarty_tpl->tpl_vars['i'] : false;
$_smarty_tpl->tpl_vars['template'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['template']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['template']->value) {
$_smarty_tpl->tpl_vars['template']->_loop = true;
$__foreach_template_2_saved_local_item = $_smarty_tpl->tpl_vars['template'];
?>
									<li class="template_item" data-id="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
										<?php echo $_smarty_tpl->tpl_vars['template']->value['template'];?>

										<div class="template_params params" id="template_params_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" style="display: none;">
											<?php
$_from = $_smarty_tpl->tpl_vars['template']->value['params'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_3_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_3_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_3_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
												<div class="row">
													<div class="col s2">
														<?php echo $_smarty_tpl->tpl_vars['key']->value;?>

													</div>
													<div class="col s10">
														<?php if (is_array($_smarty_tpl->tpl_vars['val']->value)) {?>Array
														<?php } else {
echo $_smarty_tpl->tpl_vars['val']->value;?>

														<?php }?>
													</div>
												</div>
											<?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_3_saved_local_item;
}
if ($__foreach_val_3_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_3_saved_item;
}
if ($__foreach_val_3_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_3_saved_key;
}
?>
										</div>
									</li>
								<?php
$_smarty_tpl->tpl_vars['template'] = $__foreach_template_2_saved_local_item;
}
if ($__foreach_template_2_saved_item) {
$_smarty_tpl->tpl_vars['template'] = $__foreach_template_2_saved_item;
}
if ($__foreach_template_2_saved_key) {
$_smarty_tpl->tpl_vars['i'] = $__foreach_template_2_saved_key;
}
?>
							</ul>
						</div>
					</div>
				</div>
				<div id="debug_page_languages" class="debug_page" style="display: none;">
					<div class="row">
						<div class="col s12">
							<ul class="debug_items_list">
								<?php
$_from = $_smarty_tpl->tpl_vars['languages']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_language_4_saved_item = isset($_smarty_tpl->tpl_vars['language']) ? $_smarty_tpl->tpl_vars['language'] : false;
$_smarty_tpl->tpl_vars['language'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['language']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
$__foreach_language_4_saved_local_item = $_smarty_tpl->tpl_vars['language'];
?>
									<li>
										<?php echo $_smarty_tpl->tpl_vars['language']->value;?>

									</li>
								<?php
$_smarty_tpl->tpl_vars['language'] = $__foreach_language_4_saved_local_item;
}
if ($__foreach_language_4_saved_item) {
$_smarty_tpl->tpl_vars['language'] = $__foreach_language_4_saved_item;
}
?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}
