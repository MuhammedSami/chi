<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
class Router
{
    protected array $routes;

    protected Request $request;

    protected Response $response;

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
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);

            return $this->renderView("_404");
        }

        if (is_array($callback)) {
            Application::$app->setController(new $callback[0]());
            $callback[0] = Application::$app->getController();
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback, $this->request);
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
        $layout = Application::$app->getController()->layout;
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";

        return ob_get_clean();
    }

    protected function renderOnlyView($callback, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$callback.php";

        return ob_get_clean();
    }
}
