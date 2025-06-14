<?php

namespace Core\Core;

use Core\Database\Database;
use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Router;
use Core\Session\Session;

class Application
{
    private Request $request;
    private Response $response;
    private Router $router;
    private View $view;
    private Database $database;
    private Session $session;
    private static Application $app;

    public function __construct()
    {
        $this->request = new Request($_SERVER['REQUEST_URI']);
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View('main');
        $this->database = Database::getInstance();
        $dbSettings = require_once DIR_CONFIG . '/databaseSettings.php';
        $this->database->getConnect($dbSettings);
        $this->session = new Session();

        Application::$app = $this;
    }

    public function run(): void
    {
        $this->router->dispatch();
    }

    public function getRouter(): Router
    {
        return $this->router;
    }

    public function getView(): View
    {
        return $this->view;
    }

    public static function getApp(): self
    {
        return Application::$app;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getSession(): Session
    {
        return $this->session;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }
}