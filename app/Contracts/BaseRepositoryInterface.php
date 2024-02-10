<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function create(array $parameters): Model;

    public function update(Model $model, array $parameters): Model;

    public function destroy($id);

    public function paginate(Builder $query, int $perPage = 10);
}
