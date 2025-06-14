<?php

namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        view()->render('index', ['pageTitle' => 'Главная страница']);
    }

    public function about(): void
    {
        echo 'about page';
    }

    public function contacts(): void
    {
        echo 'contacts page';
    }
}