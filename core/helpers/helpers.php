<?php

use Core\Core\Application;
use Core\Core\View;
use Core\Http\Request;
use Core\Http\Response;
use Core\Session\Session;
use JetBrains\PhpStorm\NoReturn;

function dump(mixed $data): void
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

#[NoReturn] function dumpDie(mixed $data): void
{
    dump($data);
    die;
}

function app(): Application
{
    return Application::getApp();
}

function view (): View
{
    return app()->getView();
}

function request(): Request
{
    return app()->getRequest();
}

function session(): Session
{
    return app()->getSession();
}

function response(): Response
{
    return app()->getResponse();
}

function errorLog(string $errorMessage)
{

}

function getHref(string $path = ''): string
{
    return HOST . $path;
}

function getOld(string $key): string
{
    return isset($_SESSION['formData'][$key]) ? htmlspecialchars($_SESSION['formData'][$key], ENT_QUOTES) : '';
}