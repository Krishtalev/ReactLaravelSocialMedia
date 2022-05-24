<?php

namespace App\Models;

use App\ValidationRules\PostRules;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\CustomException;
use App\Validator\CustomValidator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;


class Post extends BaseModel
{
    use hasFactory;
    use PostRules;

    public array $methods = [
        "getPosts" => ["type" => "GET", "gates" => []],
        "createPost" => ["type" => "POST", "gates" => []],
    ];

    /**
     * @param Request $request
     * @return Post
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Throwable
     */
    public static function createPost(Request $request): Post
    {
        $validator = new CustomValidator($request->post(), PostRules::$createRules, PostRules::$customMessages);
        $attributes = $validator->validated();

        $attributes['user_id'] = Auth::id();
        return Post::create($attributes);
    }


    public static function getPosts(Request $request)
    {
        $user = null;

        if (isset($request->input()['user_id'])) {
            $userId = $request->input()['user_id'];
            $user = User::find([$userId]);
        }

        if ($user) {
            dd($user->first()->userPosts()->get());
        }
        return Post::getAll()->toArray();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'user_id'
    ];
}
