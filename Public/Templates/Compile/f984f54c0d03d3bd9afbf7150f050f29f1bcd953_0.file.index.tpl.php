<?php
/* Smarty version 3.1.29, created on 2016-11-23 22:50:48
  from "C:\wamp64\www\eduCommuniCation\Public\Templates\Views\Landing\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58361d483a33f4_82052532',
  'file_dependency' => 
  array (
    'f984f54c0d03d3bd9afbf7150f050f29f1bcd953' => 
    array (
      0 => 'C:\\wamp64\\www\\eduCommuniCation\\Public\\Templates\\Views\\Landing\\index.tpl',
      1 => 1477745704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Landing/landinglayout.tpl' => 1,
  ),
),false)) {
function content_58361d483a33f4_82052532 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'title', array (
  0 => 'block_1868858361d47b8f8d7_17933158',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1772158361d47d04e23_86061662',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'footer', array (
  0 => 'block_191858361d48393759_84950121',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Landing/landinglayout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'title'}  file:Landing/index.tpl */
function block_1868858361d47b8f8d7_17933158($_smarty_tpl, $_blockParentStack) {
echo $_smarty_tpl->tpl_vars['imeStranice']->value;
}
/* {/block 'title'} */
/* {block 'body'}  file:Landing/index.tpl */
function block_1772158361d47d04e23_86061662($_smarty_tpl, $_blockParentStack) {
?>

	<div class="positionForm">
		<div class="landingForm z-depth-2">
			<div class="row landingHeader">
				<h1 class="landingpage"><?php echo $_smarty_tpl->tpl_vars['imeStranice']->value;?>
</h1>
				<p class="landingpage">Learn things differently</p>
			</div>
			<div class="row">
				<form id="register_form" method="POST">
					<div class="col s6 fullWidthOnSmall">
						<div class="row">
							<input type="text" name="register_ime" id="register_ime" class="landingInput" placeholder="Ime">
						</div>

						<div class="row">
							<input type="text" name="register_prezime" id="register_prezime" class="landingInput" placeholder="Prezime">
						</div>

						<div class="row">
							<input type="password" name="register_lozinka" id="register_lozinka" class="landingInput" placeholder="Lozinka">
						</div>

						<div class="row">
							<input type="password" name="register_lozinka2" id="register_lozinka2" class="landingInput" placeholder="Ponovite lozinku">
						</div>

						<div class="row">
							<input type="email" name="register_email" id="register_email" class="landingInput" placeholder="Email">
						</div>
					</div>
					<div class="col s6 fullWidthOnSmall">
						<div class="row">
							<select class="browser-default landingInput select" name="register_razred" id="register_razred">
								<option value="0" default id="razred_default">Razred</option>
								<option value="1">Prvi</option>
								<option value="2">Drugi</option>
								<option value="3">Treći</option>
								<option value="4">Četvrti</option>
							</select>
						</div>

						<div class="row">
							<select class="browser-default landingInput select" name="register_smjer" id="register_smjer" style="display: none;">
								<option value="0" default id="smjer_default">Smjer</option>
								<?php
$_from = $_smarty_tpl->tpl_vars['smjerovi']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_smjer_0_saved_item = isset($_smarty_tpl->tpl_vars['smjer']) ? $_smarty_tpl->tpl_vars['smjer'] : false;
$_smarty_tpl->tpl_vars['smjer'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['smjer']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['smjer']->value) {
$_smarty_tpl->tpl_vars['smjer']->_loop = true;
$__foreach_smjer_0_saved_local_item = $_smarty_tpl->tpl_vars['smjer'];
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['smjer']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['smjer']->value['naziv'];?>
</option>
								<?php
$_smarty_tpl->tpl_vars['smjer'] = $__foreach_smjer_0_saved_local_item;
}
if ($__foreach_smjer_0_saved_item) {
$_smarty_tpl->tpl_vars['smjer'] = $__foreach_smjer_0_saved_item;
}
?>
							</select>
						</div>

						<div class="desnaStrana">
							<button class="btn waves-effect waves-light" id="register_button">
								Registracija
								<i class="ion-ios-paperplane right"></i>
							</button>
							<p>Vec koristite <?php echo $_smarty_tpl->tpl_vars['imeStranice']->value;?>
?<br/>
								<a href="/prijava" class="login_button" id="login_button">
									Prijavite se <i class="ion-log-in"></i>
								</a>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
}
/* {/block 'body'} */
/* {block 'footer'}  file:Landing/index.tpl */
function block_191858361d48393759_84950121($_smarty_tpl, $_blockParentStack) {
?>

	<footer>
		<a href="#">Kontakt</a> <a href="#">Uslovi koristenja</a> <a href="#">Privatnost</a>
	</footer>
<?php
}
/* {/block 'footer'} */
}
