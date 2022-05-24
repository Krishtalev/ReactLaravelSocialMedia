<?php

namespace App\ValidationRules;

trait PostRules
{
    public static array $customMessages = [

    ];
    public static array $createRules = [
        'text' => 'required|string'
    ];
}
