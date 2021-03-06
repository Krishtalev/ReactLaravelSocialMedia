<?php

namespace App\Models;

use App\Exceptions\CustomException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Static_;

abstract class BaseModel extends Model
{
    use HasFactory;

    public array $methods;

    public function getMethods(){
        return $this->methods;
    }

    public static function getAll()
    {
        return static::all();
    }

    public static function getOne(Request $request, ?int $id)
    {
        return static::find($id);
    }

    public static function get(Request $request, ?int $id = null): mixed
    {
        try {
            return is_null($id) ? static::getAll($request) : static::getOne($request, $id);
        } catch (\Exception $e) {
            throw new CustomException($e, 401);
        }
    }
}
