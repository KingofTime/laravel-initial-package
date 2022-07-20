<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthRequest extends ResourceRequest
{
    protected function rulesFromPost()
    {

        $uri = $this->route()->uri();
        if($uri == 'api/login') {
            return [
                'login' => "required|max:32|string",
                'password' => "required|max:16"
            ];
        }

        return [];
    }
}
