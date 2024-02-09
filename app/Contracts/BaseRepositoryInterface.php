<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function findById(int $id): Model;

    public function create(array $parameters);

    public function update(int $id, array $parameters): Model;

    public function destroy($id);
}
