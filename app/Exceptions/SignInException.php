<?php

namespace App\Exceptions;

use Exception;

class SignInException extends Exception
{
    public function report()
    {

    }

    public function render()
    {
        return response([
            "error" => "SignIn Error",
            "details" => $this->getMessage()
        ], 401);
    }
}
