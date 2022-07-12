<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/system/config.php";

$app = new \Slim\App();
$app->get('/', '\DEV\Controllers\HomeController:login');
// $app->error();
$app->run();

?>