<?php

namespace App\Services;

use App\Models\User;
use Couchbase\HttpException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(private UserService $userService)
    {
    }

    /**
     * Register new user
     *
     * @param array $data
     * @return int
     */
    public function register(array $data): int
    {
        $user = $this->userService->create($data);

        return $user->id;
    }

    /**
     * Login user
     *
     * @throws HttpException
     */
    public function login(array $data): string
    {
        $user = User::query()->where('email', $data['email'])->first();

        if (!$user) {
            throw new HttpException('User not found', 404);
        }

        if(!Auth::attempt($data)) {
            throw new HttpException('Invalid username or password', 422);
        }

        Auth::loginUsingId($user->id);
        session()->regenerate();

        return $user->createToken('auth')->plainTextToken;
    }

    public function logout(): bool
    {
        Auth::logout();

        return true;
    }
}
