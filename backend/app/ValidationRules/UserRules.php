<?php

namespace App\ValidationRules;

trait UserRules
{
    public static array $customMessages = [

    ];
    public static array $registerRules = [
        'email' => 'required|string|unique:users',
        'password' => 'required|string',
        'name' => 'required|string'
    ];
    public static array $loginRules = [
        'email' => 'required|string',
        'password' => 'required|string',
    ];
}
