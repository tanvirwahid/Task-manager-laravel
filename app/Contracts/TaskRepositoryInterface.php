<?php

namespace App\Contracts;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface TaskRepositoryInterface extends BaseRepositoryInterface
{
    public function filter(string $projectCode, array $assignedTo, int $statusId = null): Builder;

    public function assignToUsers(int $userId, array $userIds): Model;

}
