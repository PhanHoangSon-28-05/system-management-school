<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Department\DepartmentRepositoryInterface::class,
            \App\Repositories\Department\DepartmentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Teacher\TeacherRepositoryInterface::class,
            \App\Repositories\Teacher\TeacherRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Role\RoleRepositoryInterface::class,
            \App\Repositories\Role\RoleRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Permission\PermissionRepositoryInterface::class,
            \App\Repositories\Permission\PermissionRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Subject\SubjectRepositoryInterface::class,
            \App\Repositories\Subject\SubjectRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Classs\ClassRepositoryInterface::class,
            \App\Repositories\Classs\ClassRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Student\StudentRepositoryInterface::class,
            \App\Repositories\Student\StudentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
