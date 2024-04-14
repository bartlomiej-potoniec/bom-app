<?php

namespace App\Core;


class Router
{
    private const CONTROLLERS_PATH = '../src/app/Controllers/';

    /**
     * Name of currently requested controller
     */
    protected string $currentController = 'Home';

    /**
     * Name of currently requested controller endpoint
     */
    protected string $currentMethod = 'index';

    /**
     * Params of the current URI request
     *
     * @var string[]
     */
    protected array $currentParams = [];

    public function __construct()
    {
        $uri = $this->getUri();
        unset($uri[0]);

        if (isset($uri[1])) {
            $this->setController($uri[1]);
            unset($uri[1]);
        }

        require_once self::CONTROLLERS_PATH . $this->currentController . '.php';

        $classNamespace = 'App\\Controllers\\' . $this->currentController;
        $classAlias = 'Controller';

        class_alias($classNamespace, $classAlias);
        $controller = new $classAlias();

        if (isset($uri[2])) {
            $this->setMethod($controller, $uri[2]);
            unset($uri[2]);
        }

        $this->setParams($uri);

        call_user_func_array([$controller, $this->currentMethod], $this->currentParams);
    }

    private function setController(string $controllerName): void
    {
        $controllerPath = self::CONTROLLERS_PATH . $controllerName . '.php';

        if (file_exists($controllerPath)) {
            $this->currentController = ucfirst($controllerName);
        }
    }

    private function setMethod(object $controller, string $methodName): void
    {
        if (method_exists($controller, $methodName)) {
            $this->currentMethod = $methodName;
        }
    }

    private function setParams(array $uri): void
    {
        $this->currentParams = $uri ? array_values($uri) : [];
    }

    /**
     * Gets current URI path.
     *
     * Parses the current URI path and returns an array representing its components.
     * - $uri[0] is the main app root name.
     * - $uri[1] is the current controller.
     * - $uri[2] is the current controller method.
     *
     * @return string[] An array representing the components of the current URI path.
     */
    private function getUri(): array
    {
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode('/', trim($uri_path, '/'));

        return $uri;
    }
}