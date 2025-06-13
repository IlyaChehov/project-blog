<?php

namespace Core\Http;

class Request
{
    private string $uri;

    public function __construct(string $uri)
    {
        $this->uri = urldecode($uri);
    }

    public function getMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public function isPost(): bool
    {
        return $this->getMethod() === 'POST';
    }

    public function isGet(): bool
    {
        return $this->getMethod() === 'GET';
    }

    public function getData(): array
    {
        $data = $this->isPost() ? $_POST : $_GET;
        return array_map('trim', $data);
    }

    public function getPath(): string
    {
        return $this->removeQueryString();
    }

    private function removeQueryString(): string
    {
        if (!$this->uri) {
            return '/';
        }

        $path = explode('?', $this->uri)[0];
        $path = trim($path, '/');
        return "/{$path}";
    }
}