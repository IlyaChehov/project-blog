<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function register(): void
    {
        view()->render('user/register');
    }

    public function store(): void
    {
        $userData = request()->getData();
        $userModel = new User();
        $userModel->loadData($userData);
        if (!$userModel->validate()) {

        } else {
            session()->set('formError', $userModel->getErrors());
            session()->set('formData', $userModel->getFilteredFields());
            response()->redirect('/register');
        }
    }
}