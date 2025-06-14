<?php

namespace App\Models;

use Core\Core\Model;

class User extends Model
{
    protected string $table = 'users';
    protected array $allowedFields = ['name', 'email', 'password', 'confirmPassword'];
    protected array $rules = [
        'name' => [
          'required' => true,
          'min' => 3,
        ],
        'email' => [
            'email' => true
        ],
        'password' => [
            'required' => true,
            'min' => 6,
            'match' => 'confirmPassword'
        ],
        'confirmPassword' => [
            'match' => 'password'
        ]
    ];
}