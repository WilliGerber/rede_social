<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/system/config.php";

$app = new \Slim\App();

//HomeController get
$app->get('/', '\DEV\Controllers\HomeController:login');
$app->get('/feed', '\DEV\Controllers\HomeController:feed');
$app->get('/feed/{usuario:[a-zA-Z0-9-_]+}', '\DEV\Controllers\HomeController:feed_usuario');    
$app->get('/configuracao', '\DEV\Controllers\HomeController:configuracao');
$app->get('/mensagens', '\DEV\Controllers\HomeController:mensagens');
$app->get('/fotos', '\DEV\Controllers\HomeController:fotos');
$app->get('/search', '\DEV\Controllers\HomeController:search');

//UserController post
$app->post('/cadastrar', '\DEV\Controllers\UserController:cadastrar');
$app->post('/login', '\DEV\Controllers\UserController:user_login');

//UserController get
$app->get('/logout', '\DEV\Controllers\UserController:logout');



$app->run();

?>