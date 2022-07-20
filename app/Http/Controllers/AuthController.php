<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $service;
    public function __construct()
    {

    }

    public function login(AuthRequest $request)
    {
        $validated = $request->validated();
//        $this->
    }
}
