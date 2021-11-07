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

    protected $response;

    /**
     * Router constructor.
     *
     * @param \App\Core\Request  $request
     * @param \App\Core\Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
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

        if ($callback === false) {
            $this->response->setStatusCode(404);

            return $this->renderView("_404");
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    public function renderView($callback, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($callback, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";

        return ob_get_clean();
    }

    protected function renderOnlyView($callback, $params)
    {
        foreach ($params as $key => $value) {
            $$key =  $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$callback.php";

        return ob_get_clean();
    }
}
