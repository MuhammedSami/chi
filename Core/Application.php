<?php

namespace App\Core;

use App\Controllers\BaseController;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class Application
{
    public Router $router;

    public Request $request;

    public Response $response;

    public static string $ROOT_DIR;

    public static self $app;

    protected BaseController $controller;


    /**
     * Application constructor.
     *
     * @param $rootPath
     */
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    /**
     * @return \App\Controllers\BaseController
     */
    public function getController(): \App\Controllers\BaseController
    {
        return $this->controller;
    }

    /**
     * @param \App\Controllers\BaseController $controller
     */
    public function setController(\App\Controllers\BaseController $controller): void
    {
        $this->controller = $controller;
    }
}
