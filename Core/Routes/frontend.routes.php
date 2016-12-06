<?php
$router->get('/', 'FrontendController@index');
$router->get('/prijava', 'FrontendController@prijava');

$router->get('/profil', 'ProfileController@index');
$router->get('/profil/{id}', 'ProfileController@index');

$router->get('/lm/{link}', 'FrontendController@linkshim');

$router->get('/pokvarena', 'ErrorController@pokvarena');

//$router->get('/cifer/{cifer}', 'FrontendController@cifer');
?>