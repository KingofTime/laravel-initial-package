<?php

namespace App\Services;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;

class UserService extends Service
{
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct(
            $userRepository,
            UserResource::class,
            UserCollection::class
        );
    }
}
