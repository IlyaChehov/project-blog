<?php

namespace Core\Session;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key, $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    public function remove(string $key): void
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}