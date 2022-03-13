<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Services\ProfileService;

class ProfileController extends ResourceController
{
    public function __construct(
        ProfileService $profileService,
        ProfileRequest $request
    )
    {
        parent::__construct(
            $profileService,
            request: $request
        );
    }
}
