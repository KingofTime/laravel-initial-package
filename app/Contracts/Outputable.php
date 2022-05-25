<?php

namespace App\Contracts;

interface Outputable
{
    public function extract(String $name, array $data);
}
