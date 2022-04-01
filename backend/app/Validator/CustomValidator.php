<?php

namespace App\Validator;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Validator;

class CustomValidator
{
    protected array $validated;

    /**
     * @param array $attributes
     * @param array $rules
     * @param array|null $messages
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Throwable
     */
    public function __construct(array $attributes, array $rules, ?array $messages)
    {
        $validator = Validator::make($attributes, $rules, $messages);
        throw_if($validator->fails(), new CustomException($validator->errors()->toArray(), 404));
        $this->validated = $validator->validated();
    }

    public function validated()
    {
        return $this->validated;
    }
}
