<?php

namespace App\ValidationRules;

trait DialogRules
{
    public static array $customMessages = [

    ];
    public static array $addToDialogRules = [
        'user_id' => 'required|exists:users,id'
    ];
    public static array $addMessageRules = [
        'text' => 'required|string'
    ];
}
