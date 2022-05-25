<?php

namespace App\Helpers;

use App\Contracts\Outputable;
use App\Helpers\Outputs\Csv;
use Carbon\Carbon;

class ReportBuilder
{
    private array $formats = [
        'csv' => Csv::class
    ];

    private Outputable $output;
    private string $name;

    public function __construct(String $name, String $format)
    {
        $this->name = $name;
        $this->output = new $this->formats[$format]();
    }

    public function extract(array $data)
    {
        $name = $this->name . Carbon::now()->toDateTimeString();
        $this->output->extract($name, $data);
    }
}
