<?php

namespace App\Repositories;

use App\Models\Report;

class ReportRepository extends Repository
{
    public function __construct(Report $report)
    {
        parent::__construct($report);
    }
}
