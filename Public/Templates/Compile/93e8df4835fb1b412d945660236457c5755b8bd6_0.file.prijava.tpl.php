<?php
/* Smarty version 3.1.29, created on 2016-11-23 22:51:26
  from "C:\wamp64\www\eduCommuniCation\Public\Templates\Views\Landing\prijava.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58361d6e718557_52270973',
  'file_dependency' => 
  array (
    '93e8df4835fb1b412d945660236457c5755b8bd6' => 
    array (
      0 => 'C:\\wamp64\\www\\eduCommuniCation\\Public\\Templates\\Views\\Landing\\prijava.tpl',
      1 => 1476276390,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Landing/landinglayout.tpl' => 1,
  ),
),false)) {
function content_58361d6e718557_52270973 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'title', array (
  0 => 'block_2758458361d6e6f3569_11374828',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_434558361d6e703847_94248644',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'footer', array (
  0 => 'block_1849458361d6e709377_87275236',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Landing/landinglayout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'title'}  file:Landing/prijava.tpl */
function block_2758458361d6e6f3569_11374828($_smarty_tpl, $_blockParentStack) {
echo $_smarty_tpl->tpl_vars['imeStranice']->value;?>
 | Prijava<?php
}
/* {/block 'title'} */
/* {block 'body'}  file:Landing/prijava.tpl */
function block_434558361d6e703847_94248644($_smarty_tpl, $_blockParentStack) {
?>

	<div class="positionForm">
		<div class="landingForm z-depth-2">
			<div class="row landingHeader">
				<h1 class="landingpage"><?php echo $_smarty_tpl->tpl_vars['imeStranice']->value;?>
</h1>
				<p class="landingpage">Learn things differently</p>
			</div>
			<div class="row">
				<form id="login_form" method="POST">
					<div class="col s6 offset-s3 fullWidthOnSmall">
						<div class="row">
							<div class="col s12">
								<input type="email" name="login_email" id="login_email" class="landingInput" placeholder="Email">
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<input type="password" name="login_lozinka" id="login_lozinka" class="landingInput" placeholder="Lozinka">
							</div>
						</div>
						<div class="row desnaStrana">
							<div class="row">
								<div class="col s6">
									<button class="btn waves-effect waves-light" id="login_button">
										Prijava
										<i class="ion-ios-paperplane"></i>
									</button>
								</div>

								<div class="col s6">
									<a href="/">
										<div class="registracija-btn">
											Registracija <i class="fa fa-user-plus"></i>
										</div>
									</a>
								</div>
							</div>

							<div class="row">
								<p>Zaboravljena lozinka?</p>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
}
/* {/block 'body'} */
/* {block 'footer'}  file:Landing/prijava.tpl */
function block_1849458361d6e709377_87275236($_smarty_tpl, $_blockParentStack) {
?>

	<footer>
		<a href="#">Kontakt</a> <a href="#">Uslovi koristenja</a> <a href="#">Privatnost</a>
	</footer>
<?php
}
/* {/block 'footer'} */
}
