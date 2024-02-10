<?php

namespace App\Repositories;

use App\Contracts\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;

class EloquentProjectRepository extends EloquentBaseRepository implements ProjectRepositoryInterface
{
    public function __construct(private Project $project)
    {
        parent::__construct($project);
    }

    public function filterByName(string $name): Builder
    {
        return $this->project->query()
            ->where('name', 'like', '%'.$name.'%');
    }
}
