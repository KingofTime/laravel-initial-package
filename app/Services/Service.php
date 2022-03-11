<?php

namespace App\Services;

use App\Repositories\Repository;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Service
{
    public function __construct(
        protected Repository $repository
    ) {}

    public function getAll(array $filter): ResourceCollection
    {
        return new ResourceCollection($this->repository->getAll($filter));
    }

    public function paginate(array $filter): ResourceCollection
    {
        return new ResourceCollection($this->repository->paginate($filter));
    }

    public function create(array $data): JsonResource
    {
        return new JsonResource($this->repository->create($data));
    }
}
