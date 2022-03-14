<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends Service
{
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
    }
}
