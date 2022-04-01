<?php

namespace App\Models;

use App\Exceptions\CustomException;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Http\Request;

class City extends BaseModel
{
    use Authenticatable, Authorizable, hasFactory;

    public static array $methods = [
        "add" => ["type" => "POST", "gates" => []],
        "remove" => ["type" => "DELETE", "gates" => []],
        "getFavourite" => ["type" => "GET", "gates" => []],
        "get" => ["type" => "GET", "gates" => []],
    ];

    protected $fillable = [
        'name', "api_city_id"
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, "city_user");
    }

    /**
     * adds city to current user
     *
     * @param Request $request
     * @param int $id
     * @throws CustomException
     */
    public static function add(Request $request, int $id): void
    {
        try {
            User::find(auth()->id())
                ->cities()
                ->attach($id);
        } catch (\Exception $e)  {
            throw new CustomException("Failed", 400);
        }
    }

    /**
     * removes city from current user
     *
     * @param Request $request
     * @param int $id
     * @throws CustomException
     */
    public static function remove(Request $request, int $id): void
    {
        try {
            User::find(auth()->id())
                ->cities()
                ->detach($id);
        } catch (\Exception $e) {
            throw new CustomException("Failed", 400);
        }

    }

    /**
     * gets list of favourite cities for current user
     *
     * @param Request $request
     * @return array
     * @throws CustomException
     */
    public static function getFavourite(Request $request): array
    {
        try {
            return User::find(auth()->id())
                ->cities()
                ->get()
                ->toArray();
        } catch (\Exception $e) {
            throw new CustomException("Failed", 400);
        }
    }
}

