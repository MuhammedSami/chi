<?php
require_once __DIR__.'/../bootstrap/app.php';

use App\Controllers\SiteController;

$app->router->get('/', 'home');

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->router->get('/login', [\App\Controllers\AuthController::class, 'login']);
$app->router->post('/login', [\App\Controllers\AuthController::class, 'login']);

$app->router->get('/register', [\App\Controllers\AuthController::class, 'register']);
$app->router->post('/register', [\App\Controllers\AuthController::class, 'register']);

$app->run();
