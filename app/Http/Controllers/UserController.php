<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use App\Helpers\TrashMethods;

class UserController extends ResourceController
{
    use TrashMethods;
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
