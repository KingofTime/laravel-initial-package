<?php

namespace App\Http\Requests;


class UserRequest extends ResourceRequest
{
    public function rulesFromPost()
    {
        return [
            "name" => "required|string|max:255",
            "login" => "required|string|unique:users,login|max:32",
            "cpf" => "required|string|max:11|unique:users,cpf|cpf",
            "email" => "required|unique:users,email|email|max:255",
            "password" => "required|string|max:16",
            "profile_id" => "integer|required"
        ];
    }

    public function rulesFromPut(int $id)
    {
        return [
            "name" => "required|string|max:255",
            "login" => "required|string|unique:users,login,$id|max:32",
            "cpf" => "required|string|max:11|unique:users,cpf,$id|cpf",
            "email" => "required|unique:users,email,$id|email|max:255",
            "password" => "string|max:16",
            "profile_id" => "integer|required"
        ];
    }
}
