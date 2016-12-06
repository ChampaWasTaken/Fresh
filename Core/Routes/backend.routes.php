<?php

/**
 * Autorizacija
 */
$router->post('/registracija', 'AuthController@register');
$router->post('/authentikacija', 'AuthController@authenticate');
$router->post('/odjava', 'AuthController@logout');

/**
 * Statusi
 */

$router->post('/dodajkomentar', 'StatusController@dodajKomentar');
$router->post('/ucitajkomentare', 'StatusController@ucitajKomentare');
$router->post('/lajkstatus', 'StatusController@lajkStatus');

/**
 * Pretraga
 */

$router->post('/simplepretraga', 'SearchController@simplePretraga');

/**
 * Poruke
 */

$router->post('/topbarporuke', 'ChatController@loadTopbar');
$router->post('/posaljiporuku', 'ChatController@posaljiPoruku');
$router->post('/ucitajemoji', 'EmojiController@ucitajEmoji');
$router->post('/ucitajchatbox', 'ChatController@ucitajChatbox');
$router->post('/ucitajporuke', 'ChatController@ucitajPoruke');


/**
 * Upload fajlova
 */
$router->post('/uploadimage', 'FileController@uploadImage');
$router->post('/uploadfile', 'FileController@uploadFile');
?>