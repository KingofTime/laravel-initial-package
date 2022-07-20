<?php

namespace App\Exceptions;

use Exception;

class RelationalIntegrityException extends Exception
{
    public function report()
    {

    }

    public function render()
    {
        return response([
            "error" => "error when performing operation",
            "details" => "operation breaks integrity, check relationships"
        ], 500);
    }
}
