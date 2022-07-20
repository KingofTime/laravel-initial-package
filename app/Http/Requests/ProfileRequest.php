<?php

namespace App\Http\Requests;


class ProfileRequest extends ResourceRequest
{
    protected function rulesFromPost()
    {
        return [
            "name" => "string|max:255|unique:profiles,name|required"
        ];
    }

    protected function rulesFromPut(int $id)
    {
        return [
            "name" => "string|max:255|unique:profiles,name,$id|required"
        ];
    }
}
