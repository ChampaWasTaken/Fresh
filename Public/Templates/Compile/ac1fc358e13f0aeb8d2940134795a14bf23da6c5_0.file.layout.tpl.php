<?php
/* Smarty version 3.1.29, created on 2016-12-03 23:23:34
  from "C:\wamp64\www\eduCommuniCation\Public\Templates\Views\layout.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_584353f686f9a4_07191255',
  'file_dependency' => 
  array (
    'ac1fc358e13f0aeb8d2940134795a14bf23da6c5' => 
    array (
      0 => 'C:\\wamp64\\www\\eduCommuniCation\\Public\\Templates\\Views\\layout.tpl',
      1 => 1480807324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_584353f686f9a4_07191255 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="bs">
	<head>
		<base href="/">
		<title><?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'title', array (
  0 => 'block_24059584353f681ad78_45521477',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!--<link rel="apple-touch-icon" sizes="57x57" href="/images/favicons/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/images/favicons/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/images/favicons/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
		<link rel="manifest" href="/images/favicons/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/images/favicons/ms-icon-144x144.png">
		<meta name="theme-color" content="transparent">-->
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&subset=latin-ext" rel="stylesheet">
		<link rel="stylesheet" href="Ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="Fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="Materialize/css/materialize.min.css">
		<link rel="stylesheet" href="Css/main.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="Javascript/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="Javascript/functions.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="Javascript/Classes/search.class.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="Materialize/js/materialize.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="http://localhost:9014/socket.io/socket.io.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="Javascript/Classes/client.class.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="Javascript/Classes/chatbox.class.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="Javascript/main.js"><?php echo '</script'; ?>
>
		<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'head', array (
  0 => 'block_11800584353f6822396_41241332',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

	</head>
	<body>
		<audio id="notifikacija_zvuk" src="Storage/Audio/new_message.wav" preload="auto" autostart="0" style="display: none;"></audio>
		<div id="my_profile_data" data-imeprezime="<?php echo $_smarty_tpl->tpl_vars['user']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['prezime'];?>
" data-avatar="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"></div>

		<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'menu', array (
  0 => 'block_8305584353f683a7d0_68587190',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

		<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'header', array (
  0 => 'block_28246584353f68629d3_56459902',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

		<div id="error-testing"></div>
		<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_24279584353f6868d71_15513717',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

		<div class="spacing"></div>
		<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'footer', array (
  0 => 'block_5060584353f686ca75_35840177',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

	</body>
</html><?php }
/* {block 'title'}  file:layout.tpl */
function block_24059584353f681ad78_45521477($_smarty_tpl, $_blockParentStack) {
?>
eduCommuniCation<?php
}
/* {/block 'title'} */
/* {block 'head'}  file:layout.tpl */
function block_11800584353f6822396_41241332($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'head'} */
/* {block 'menu'}  file:layout.tpl */
function block_8305584353f683a7d0_68587190($_smarty_tpl, $_blockParentStack) {
?>

			<div class="tobar_holder">
				<div class="topbar" id="main_topbar">
					<div class="container">
						<a href="/">
							<div class="logo">
								<span class="big">eduCommuniCation</span>
								<span class="small">ecc</span>
							</div>
						</a>

						<div class="search-box" id="main_search">
							<div class="ikona">
								<i class="fa fa-search" aria-hidden="true"></i>
							</div>
							<input type="text" id="main_search_input" placeholder="<?php echo $_smarty_tpl->tpl_vars['language_layout']->value['placeholders']['search'];?>
">
						</div>

						<div class="menu-items">
							<a href="/">
								<div class="item waves-effect waves-light">
									<i class="fa fa-home"></i>
								</div>
							</a>

							<div id="mobile_search" class="item waves-effect waves-light hide-on-med-and-up">
								<i class="fa fa-search"></i>
							</div>

							<div class="item waves-effect waves-light">
								<i class="fa fa-bell"></i>
							</div>

							<div class="item waves-effect waves-light" id="topbar_message_button">
								<i class="fa fa-comments"></i>
							</div>
							
							<div class="item waves-effect waves-light" id="menu_more">
								<i class="fa fa-ellipsis-v" id="menu_more_icon"></i>
							</div>
						</div>
						<div class="search_results" id="search_results" style="display: none;"></div>
					</div>
				</div>
				<div class="mobile_search_bar" id="mobile_search_bar">
					<input class="normal_input" id="mobile_search_input" placeholder="<?php echo $_smarty_tpl->tpl_vars['language_layout']->value['placeholders']['search'];?>
">
					<i id="close_mobile_search" class="fa fa-times" aria-hidden="true"></i>
				</div>
				<div class="mobile_search_results z-depth-1" id="mobile_search_results"></div>
			</div>
			<div class="topbar_dropdown_holder z-depth-1" id="topbar_dropdown_messages" style="display: none;">
				<p><?php echo $_smarty_tpl->tpl_vars['language_layout']->value['desc']['loading'];?>
</p>
				<div class="loaderHolder">
					<div class="progress">
						<div class="indeterminate"></div>
					</div>
				</div>
			</div>
			<div class="more_box z-depth-1" style="display: none;" id="more_box">
				<a href="/profil">
					<div class="avatar-placement">
						<img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
" class="avatar">
						<div class="profile-tag-small">
							<i class="ion-person"></i> <?php echo $_smarty_tpl->tpl_vars['language_layout']->value['dropdown_menu']['profile'];?>

						</div>
						<div class="profile-tag">
							<p>
								<i class="ion-person"></i><br/>
								<?php echo $_smarty_tpl->tpl_vars['language_layout']->value['dropdown_menu']['profile'];?>

							</p>
						</div>
					</div>
				</a>

				<h4 class="pozdrav"><?php echo $_smarty_tpl->tpl_vars['language_layout']->value['greetings']['hello'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['ime'];?>
 !</h4>

				<ul class="menu">
					<a href="#"><li><i class="ion-gear-b"></i> <?php echo $_smarty_tpl->tpl_vars['language_layout']->value['dropdown_menu']['settings'];?>
</li></a>
					<a href="#"><li><i class="ion-information-circled"></i> <?php echo $_smarty_tpl->tpl_vars['language_layout']->value['dropdown_menu']['terms'];?>
</li></a>
					<a href="#" id="main_button_logout"><li><i class="ion-log-out"></i> <?php echo $_smarty_tpl->tpl_vars['language_layout']->value['dropdown_menu']['logout'];?>
</li></a>
				</ul>
			</div>

			<div id="chatbox_appender"></div>
		<?php
}
/* {/block 'menu'} */
/* {block 'header'}  file:layout.tpl */
function block_28246584353f68629d3_56459902($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'header'} */
/* {block 'body'}  file:layout.tpl */
function block_24279584353f6868d71_15513717($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'body'} */
/* {block 'footer'}  file:layout.tpl */
function block_5060584353f686ca75_35840177($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'footer'} */
}
