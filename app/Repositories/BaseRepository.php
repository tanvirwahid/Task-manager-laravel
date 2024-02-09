<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{

    public function __construct(protected Model $model)
    {
    }

    public function findById(int $id): Model
    {
        return $this->model->find($id);
    }

    public function create(array $parameters)
    {
        $this->model->create($parameters);
    }

    public function update(int $id, array $parameters): Model
    {
        $model = $this->findById($id);
        $model->update($parameters);
        return $model;
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

}
