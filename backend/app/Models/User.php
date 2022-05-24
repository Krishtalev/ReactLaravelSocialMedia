<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use App\Exceptions\CustomException;
use App\Validator\CustomValidator;
use App\ValidationRules\UserRules;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends BaseModel implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, hasFactory;
    use UserRules;

    public array $methods = [
    ];


    public function addFriend() {
        $currentUser = Auth::user();
    }

    /**
     * @param Request $request
     * @return User
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Throwable
     */
    public static function register(Request $request): User
    {
        $validator = new CustomValidator($request->post(), UserRules::$registerRules, UserRules::$customMessages);
        $attributes = $validator->validated();

        $attributes['password'] = app('hash')->make($attributes['password']);
        return User::create($attributes);
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Throwable
     */
    public static function login(Request $request): array
    {
        $validator = new CustomValidator($request->post(), UserRules::$loginRules, UserRules::$customMessages);
        $credentials = $validator->validated();

        Auth::factory()->setTTL(3600);
        throw_if(!$token = Auth::attempt($credentials), new CustomException('Wrong',401));
        return [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ];
    }


    public function userPosts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);

    }

    public function friends()
    {
        return $this->hasManyThrough();
    }

    public function dialogs()
    {
        return $this->hasManyThrough();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', "age", "site", "education"
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
