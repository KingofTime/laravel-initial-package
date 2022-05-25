<?php

namespace App\Http\Controllers;



use App\Http\Requests\ReportRequest;
use App\Services\ReportService;

class ReportController extends ResourceController
{
    public function __construct(
        ReportService $service,
        ReportRequest $request)
    {
        $this->service = $service;
        $this->request = $request;
    }
}
