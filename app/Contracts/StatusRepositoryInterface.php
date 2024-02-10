<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface StatusRepositoryInterface
{
    public function findAll(): Collection;
}
