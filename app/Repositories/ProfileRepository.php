<?php

namespace App\Repositories;

use App\Models\Profile;

class ProfileRepository extends Repository
{
    public function __construct(
        protected Profile $profile
    )
    {
        parent::__construct($this->profile);
    }
}
