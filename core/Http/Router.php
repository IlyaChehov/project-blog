<?php

namespace Core\Http;

class Router
{
    private array $routes = [];
    private array $params = [];

    public function __construct(
        private Request $request,
        private Response $response
    )
    {
    }

    private function addRoute(string $path, callable|array $handler, string $method): void
    {
        $path = trim($path, '/');
        $this->routes[] = [
            'path' => "/{$path}",
            'handler' => $handler,
            'method' => $method
        ];
    }

    public function get(string $path, callable|array $handler): self
    {
        $this->addRoute($path, $handler, 'GET');
        return $this;
    }

    public function post(string $path, callable|array $handler): self
    {
        $this->addRoute($path, $handler, 'POST');
        return $this;
    }

    private function match(): array|false
    {
        $path = $this->request->getPath();
        foreach ($this->routes as $route) {
            $pattern = "#^{$route['path']}$#";
            if (
                preg_match($pattern, $path, $matches) &&
                $this->request->getMethod() === $route['method']
            ) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $this->params[$k] = $v;
                    }
                }
                return $route;
            }
        }
        return false;
    }

    public function dispatch(): mixed
    {
        $route = $this->match();
        if ($route === false) {
            echo 'Ошибка 404';
            $this->response->setResponseCode();
            die;
        }
        $handler = $route['handler'];
        if (is_array($handler)) {
            $handler[0] = new $handler[0];
        }

        return call_user_func($handler);
    }
}