<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Responses\ApiResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use phpcent\Client;


class AuthController extends Controller
{
    public Client $client;

    public function __construct()
    {
        $this->client = new Client("http://centrifugo:8000/api", "api_key");
    }

    /**
     * Admin creates user
     *
     * @param Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    function register(Request $request): Response
    {
        return ApiResponses::successResponse(User::register($request), "Registered", 201);
    }

    /**
     * returns jwt token of user with email and password
     *
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $apiToken = User::login($request);
        $userId = Auth::user()->id;
        $socketToken = $this->client->setSecret('secret')->generateConnectionToken($userId);

        $data = ["authToken" => $apiToken, "socketToken" => $socketToken];
        return ApiResponses::successResponse($data, "Logged", 200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(): Response
    {
        auth()->logout();
        return ApiResponses::successResponse(null, "Logout success", 200);
    }
}
