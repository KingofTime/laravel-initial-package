<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Services\ProfileService;

class ProfileController extends ResourceController
{
    public function __construct(
        ProfileService $profileService,
        ProfileRequest $profileRequest
    )
    {
        parent::__construct(
            $profileService,
            request: $profileRequest
        );
    }
}
