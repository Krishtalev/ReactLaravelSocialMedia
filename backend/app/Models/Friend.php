<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;



class Friend extends BaseModel
{
    use hasFactory;

    public array $methods = [

    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'friend_id'
    ];
}
