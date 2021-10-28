<?php
require_once __DIR__.'/vendor/autoload.php';

use App\Core\Application;

$app = new Application();

$app->router->get('/', function (){
    echo "Hello World";
});

$app->run();
