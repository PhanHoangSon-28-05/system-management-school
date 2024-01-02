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
            \App\Repositories\Department\TeacherDepartment\TeacherDepartmentRepositoryInterface::class,
            \App\Repositories\Department\TeacherDepartment\TeacherDepartmentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Department\GradeDepartment\GradeDepartmentRepositoryInterface::class,
            \App\Repositories\Department\GradeDepartment\GradeDepartmentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Grade\StudentGrade\StudentGradeRepositoryInterface::class,
            \App\Repositories\Grade\StudentGrade\StudentGradeRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Grade\TeacherGrade\TeacherGradeRepositoryInterface::class,
            \App\Repositories\Grade\TeacherGrade\TeacherGradeRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Teacher\TeacherRepositoryInterface::class,
            \App\Repositories\Teacher\TeacherRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Student\StudentRepositoryInterface::class,
            \App\Repositories\Student\StudentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Subject\SubjectRepositoryInterface::class,
            \App\Repositories\Subject\SubjectRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Room\RoomRepositoryInterface::class,
            \App\Repositories\Room\RoomRepository::class
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
            \App\Repositories\Grade\GradeRepositoryInterface::class,
            \App\Repositories\Grade\GradeRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Rank\RankRepositoryInterface::class,
            \App\Repositories\Rank\RankRepository::class
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
