<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Couchbase\HttpException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    /**
     * @throws HttpException
     */
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();

        $token = $this->authService->login($data);

        return response()->json(['token' => $token]);
    }

    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();

        $result = $this->authService->register($data);

        return response()->json(['data' => $result]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function logout(): \Illuminate\Http\Response
    {
        $this->authService->logout();
        return response()->noContent();
    }
}
