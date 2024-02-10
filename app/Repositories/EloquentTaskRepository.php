<?php

namespace App\Repositories;

use App\Contracts\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class EloquentTaskRepository extends EloquentBaseRepository implements TaskRepositoryInterface
{
    public function __construct(private Task $task)
    {
        parent::__construct($task);
    }

    public function filter(string $projectCode, array $assignedTo = null, int $statusId = null): Builder
    {
        $query = $this->task
            ->query()
            ->where('project_code', 'like', '%'.$projectCode.'%');

        if($statusId != null)
        {
            $query->where('status_id', $statusId);
        }

        if($assignedTo != null && count($assignedTo) > 0)
        {
            $query->whereHas('users', function ($query) use ($assignedTo) {
                $query->whereIn('users.id', $assignedTo);
            });
        }

        return $query->with(['project', 'status']);
    }

    public function assignToUsers(int $userId, array $userIds): Model
    {
        $task = $this->task->find($userId);
        $task->users()
            ->sync($userIds);

        return $task;
    }

}
