<?php

namespace App\Services;

use App\Helpers\ReportBuilder;
use App\Http\Resources\ReportCollection;
use App\Http\Resources\ReportResource;
use App\Repositories\ReportRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;

class ReportService extends Service
{
    private String $host;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->host = env('APP_URL');

        parent::__construct(
            $reportRepository,
            ReportResource::class,
            ReportCollection::class
        );
    }

    public function create(array $data): JsonResource
    {
        $data['user_id'] = 1;

        $url = $this->host. '/api/'. $data['endpoint'];
        $response = Http::get($url);

        if($response->successful()) {
            $reportBuilder = new ReportBuilder($data['name'], $data['format']);
            $reportBuilder->extract($response->json());

            return parent::create($data);
        } else {
            $response->throw();
        }
    }
}
