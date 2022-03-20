<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Responses\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SingleController extends Controller
{
    public function __invoke(string $model, string $method, Request $request): Response
    {


        return ApiResponses::successResponse([$model],$method,200);
    }
}
