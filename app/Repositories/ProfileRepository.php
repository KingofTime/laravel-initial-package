<?php

namespace App\Repositories;

use App\Models\Profile;

class ProfileRepository extends Repository
{
    public function __construct(Profile $profile)
    {
        parent::__construct($profile);
    }
}
