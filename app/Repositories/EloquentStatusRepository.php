<?php

namespace App\Repositories;

use App\Contracts\StatusRepositoryInterface;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;

class EloquentStatusRepository implements StatusRepositoryInterface
{
    public function __construct(private Status $status)
    {
    }

    public function findAll(): Collection
    {
        return $this->status->all();
    }

}
