<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct(
        protected AuthService $authService
    )
    {}

    public function login(AuthRequest $request)
    {
        $validated = $request->validated();
        $token = $this->authService->signIn(
            $validated['login'],
            $validated['password']
        );

        return response(["token" => $token], 200);
    }
}
