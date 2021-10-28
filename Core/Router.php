<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class Router
{
    protected $routes;

    protected $request;

    /**
     * Router constructor.
     *
     * @param \App\Core\Request $request
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false){
            echo "NOT FOUND";
            exit;
        }

        echo call_user_func($callback);
    }
}
