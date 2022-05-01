<?php

namespace App\Http\Requests;


class ProfileRequest extends ResourceRequest
{
    public function rulesFromPost()
    {
        return [
            "name" => "string|max:255|unique:profiles,name|required"
        ];
    }

    public function rulesFromPut(int $id)
    {
        return [
            "name" => "string|max:255|unique:profiles,name,$id|required"
        ];
    }
}
