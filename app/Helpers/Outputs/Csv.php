<?php

namespace App\Helpers\Outputs;

use App\Contracts\Outputable;

class Csv implements Outputable
{

    public function extract(String $name, array $data)
    {
        dd("AIAIAI CSV");
    }
}
