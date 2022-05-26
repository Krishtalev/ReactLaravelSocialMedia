<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;



class DialogUser extends BaseModel
{
    use hasFactory;

    protected $fillable = [
        'dialog_id',
        'user_id'
    ];

    public array $methods = [

    ];


}
