<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/system/config.php";

$app = new \Slim\App();

// ========== HomeController ==========
// get
$app->get('/', '\DEV\Controllers\HomeController:login');
$app->get('/feed', '\DEV\Controllers\HomeController:feed');
$app->get('/feed/{usuario:[a-zA-Z0-9-_]+}', '\DEV\Controllers\HomeController:feed_usuario');    
$app->get('/configuracao', '\DEV\Controllers\HomeController:configuracao');
$app->get('/mensagens', '\DEV\Controllers\HomeController:mensagens');
$app->get('/fotos', '\DEV\Controllers\HomeController:fotos');
$app->get('/search', '\DEV\Controllers\HomeController:search');


// ========== UserController ==========
// post
$app->post('/cadastrar', '\DEV\Controllers\UserController:cadastrar');
$app->post('/login', '\DEV\Controllers\UserController:user_login');
$app->post('/about_me', '\DEV\Controllers\UserController:about_me');
$app->post('/configuracao', '\DEV\Controllers\UserController:configuracao');
// get
$app->get('/logout', '\DEV\Controllers\UserController:logout');


// ========== MessageController ==========
// post
$app->post('/new_message', '\DEV\Controllers\MessageController:new_message');
$app->post('/getMessages', '\DEV\Controllers\MessageController:getMessages');


// ========== PublishController ==========
// post
$app->post('/publish', '\DEV\Controllers\PublishController:publish');


$app->run();

?>