<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Repository
{
    public function __construct(
       protected Model $model
    ){}

    public function get(int $id): Model
    {
        return $this->model::findOrFail($id);
    }

    public function getAll(array $filter): Collection
    {
        return $this->model::where($filter)->get();
    }

    public function paginate(array $filter): LengthAwarePaginator
    {
        return $this->model::where($filter)->paginate(5);
    }

    public function create($data): Model
    {
        return $this->model::create($data);
    }
}
