<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentBaseRepository implements BaseRepositoryInterface
{
    public function __construct(protected Model $model)
    {
    }

    public function create(array $parameters): Model
    {
        return $this->model->create($parameters);
    }

    public function update(Model $model, array $parameters): Model
    {
        $model->update($parameters);

        return $model;
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function paginate(Builder $query, int $perPage = 10)
    {
        return $query->paginate($perPage);
    }
}
