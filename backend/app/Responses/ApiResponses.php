<?php

declare(strict_types=1);

namespace App\Responses;

use App\Models\BaseModel;
use Illuminate\Http\Response;

class ApiResponses
{
    /**
     * @param array|BaseModel|null $data
     * @param string|null $message
     * @param int $status
     * @return Response
     */
    static public function successResponse(array|BaseModel|null $data, ?string $message, int $status): Response
    {
        return response(["data" => $data, "message" => $message, "success" => true], $status);
    }

    /**
     * @param array|string $errors
     * @param int $status
     * @return Response
     */
    static public function errorResponse(array|string $errors, int $status): Response
    {
        return response(["errors" => $errors, "success" => false], $status);
    }
}
