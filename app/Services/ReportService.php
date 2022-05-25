<?php

namespace App\Services;

use App\Http\Resources\ReportCollection;
use App\Http\Resources\ReportResource;
use App\Repositories\ReportRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportService extends Service
{
    public function __construct(ReportRepository $reportRepository)
    {
        parent::__construct(
            $reportRepository,
            ReportResource::class,
            ReportCollection::class
        );
    }

    public function create(array $data): JsonResource
    {
        $data['file'] = '.';
        $data['user_id'] = 1;

        return parent::create($data);
    }
}
