<?php

namespace App\Services;

use App\Exceptions\SignInException;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Scalar\String_;

class AuthService
{
    public function __construct(
        protected UserRepository $userRepository
    )
    {}

    /**
     * @throws SignInException
     */
    public function signIn(String $login, String $password): String
    {
        $user = $this->userRepository->getAll(["login" => $login]);

        if(count($user)) {
            $user = $user[0];

            if (Hash::check($password, $user->password)) {
                return $user->createToken('Token')->accessToken;
            }
        }

        throw new SignInException("Login or password invalid");
    }
}
