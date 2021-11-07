<?php
require_once __DIR__.'/../bootstrap/app.php';

use App\Controllers\SiteController;

$app->router->get('/', 'home');

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->run();
