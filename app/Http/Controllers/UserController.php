<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends ResourceController
{
    public function __construct(
        UserService $userService,
        UserRequest $userRequest
    ){
        parent::__construct(
            $userService,
            request: $userRequest
        );
    }
}
