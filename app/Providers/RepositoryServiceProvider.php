<?php

namespace App\Providers;

use App\Contracts\RoleRepositoryInterFace;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\EloquentUserRepository;
use App\Repositories\RoleRepository;
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
            RoleRepository::class
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
