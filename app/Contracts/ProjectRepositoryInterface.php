<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface ProjectRepositoryInterface extends BaseRepositoryInterface
{
    public function filterByName(string $name): Builder;
}
