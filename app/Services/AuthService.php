<?php

namespace App\Services;

use App\Exceptions\RelationalIntegrityException;
use App\Repositories\ProfileRepository;
use App\Repositories\UserRepository;

class ProfileService extends Service
{
    public function __construct(
        protected ProfileRepository $profileRepository,
        protected UserRepository $userRepository)
    {
        parent::__construct($this->profileRepository);
    }

    /**
     * @throws RelationalIntegrityException
     */
    public function delete($id) {
        if ($this->userRepository->exists(['profile_id' => $id])) {
            throw new RelationalIntegrityException();
        } else {
            $this->profileRepository->delete($id);
        }
    }
}
