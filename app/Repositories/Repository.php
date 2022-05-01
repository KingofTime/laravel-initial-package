<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Repository
{
    public function __construct(
       protected Model $model
    ){
    }

    public function get(int $id): Model
    {
        return $this->model::findOrFail($id);
    }

    public function getAll(array $filter): Collection
    {
        return $this->model::where($filter)->get();
    }

    public function exists(array $filter): bool
    {
        return $this->model::where($filter)->exists();
    }

    public function paginate(array $filter, int $per_page): LengthAwarePaginator
    {
        return $this->model::where($filter)->paginate($per_page);
    }

    public function create($data): Model
    {
        return $this->model::create($data);
    }

    public function update($id, $data): void
    {
        $this->model::findOrFail($id)->update($data);
    }

    public function delete($id): void
    {
        $this->model::findOrFail($id)->delete();
    }
}
