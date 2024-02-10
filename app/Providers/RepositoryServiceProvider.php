<?php

namespace App\Providers;

use App\Contracts\ProjectRepositoryInterface;
use App\Contracts\RoleRepositoryInterFace;
use App\Contracts\StatusRepositoryInterface;
use App\Contracts\TaskRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\EloquentProjectRepository;
use App\Repositories\EloquentStatusRepository;
use App\Repositories\EloquentTaskRepository;
use App\Repositories\EloquentUserRepository;
use App\Repositories\EloquentRoleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            EloquentUserRepository::class
        );

        $this->app->bind(
            RoleRepositoryInterFace::class,
            EloquentRoleRepository::class
        );

        $this->app->bind(
            ProjectRepositoryInterface::class,
            EloquentProjectRepository::class
        );

        $this->app->bind(
            TaskRepositoryInterface::class,
            EloquentTaskRepository::class
        );

        $this->app->bind(
            StatusRepositoryInterface::class,
            EloquentStatusRepository::class
        );

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
