<?php

namespace App\Controllers;

use App\Core\Application;

/**
 * @author  Muhammed Sami
 * @package App\Controllers
 */
class BaseController
{
    public string $layout = "main";

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
}
