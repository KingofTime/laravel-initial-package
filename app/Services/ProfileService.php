<?php

namespace App\Services;

use App\Repositories\ProfileRepository;

class ProfileService extends Service
{
    public function __construct(ProfileRepository $profileRepository)
    {
        parent::__construct($profileRepository);
    }
}
