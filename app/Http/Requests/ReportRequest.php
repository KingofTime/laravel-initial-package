<?php

namespace App\Http\Requests;

class ReportRequest extends ResourceRequest
{
    public function rulesFromPost()
    {
        return [
            "name" => "max:255|string|required|unique:reports",
            "endpoint" => "max:255|required",
            "format" => "string|required"
        ];
    }

    public function rulesFromPut(int $id)
    {
        return [
            "name" => "max:255|string|required|unique:reports,name,$id",
            "endpoint" => "max:255|required",
            "format" => "string|required"
        ];
    }
}
