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

    public function get(int $id): JsonResource
    {
        return new JsonResource($this->repository->get($id));
    }

    public function getAll(array $filter): ResourceCollection
    {
        return new ResourceCollection($this->repository->getAll($filter));
    }

    public function paginate(array $filter, int $per_page): ResourceCollection
    {
        return new ResourceCollection($this->repository->paginate($filter, $per_page));
    }

    public function create(array $data): JsonResource
    {
        return new JsonResource($this->repository->create($data));
    }

    public function update(id $id, array $data): void
    {
        $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);
    }

    public function restore(int $id)
    {
        $this->repository->restore($id);
    }

    public function onlyTrash(array $filter): ResourceCollection
    {
        return new ResourceCollection($this->repository->onlyTrash($filter));
    }

    public function onlyTrashPaginate(array $filter, int $per_page): ResourceCollection
    {
        return new ResourceCollection($this->repository->onlyTrashPaginate($filter, $per_page));
    }

    public function forceDelete(int $id)
    {
        $this->repository->forceDelete($id);
    }
}
