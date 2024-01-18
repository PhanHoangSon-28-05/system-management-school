<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\Department\Grade__DepartmentsController;
use App\Http\Controllers\Admin\Department\Student_DepartmentsController;
use App\Http\Controllers\Admin\Department\Teacher_DepartmentsController;
use App\Http\Controllers\Admin\Grade\Student_GradeController;
use App\Http\Controllers\Admin\Grade\Teacher_GradeController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\Scheldule\Teacher_SchelduleController;
use App\Http\Controllers\Admin\Score\ScoreController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\User\TeacherUserController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard')->middleware('auth');

/**
 * Login Routes
 */
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

/**
 * Logout Routes
 */
Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

Route::get('/teacherUser', [TeacherUserController::class, 'index'])->name('teachers.index');

// Route::prefix('teacher')->middleware('auth')->group(function () {
//     Route::prefix('teacherUsers')->controller(RoleController::class)->name('teachers.')->group(function () {
//         Route::get('/', 'index')->name('index');
//     });
// });

Route::prefix('admin')->middleware('auth')->group(function () {
    // Routes in role
    Route::prefix('roles')->controller(RoleController::class)->name('roles.')->group(function () {
        // Route::get('/', 'index')->name('index');
        // Route::post('/', 'store')->name('store');
        // Route::get('/create', 'create')->name('create');
        // Route::get('/{coupon}/edit', 'edit')->name('edit');
        // Route::put('/{coupon}', 'update')->name('update');
        // Route::delete('/{coupon}', 'destroy')->name('destroy');

        Route::get('/', 'index')->name('index')->middleware('role:super-admin');
        Route::post('/', 'store')->name('store')->middleware('role:super-admin');
        Route::get('/create', 'create')->name('create')->middleware('role:super-admin');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('role:super-admin');
        Route::put('/{coupon}', 'update')->name('update')->middleware('role:super-admin');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('role:super-admin');
    });
    //

    // Routes in User
    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-user');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-user');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-user');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-user');
    });

    // Routes in Teacher
    Route::prefix('teachers')->controller(TeacherController::class)->name('teachers.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-teacher');
        Route::post('/', 'store')->name('store')->middleware('permission:create-teacher');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-teacher');
        Route::get('/show/{coupon}', 'show')->name('show')->middleware('permission:show-teacher');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-teacher');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-teacher');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-teacher');
        Route::post('/show/{id}', 'add_subjectGiveteacher')->name('add_subjectGiveteacher')->middleware('permission:create-teacher');
        Route::delete('/{idTeacher}/{coupon}', 'destroy_subjectGiveteacher')->name('destroy_subjectGiveteacher')->middleware('permission:delete-teacher');
        Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
            Route::get('/show/{coupon}/add-acount', 'addCountTeacher')->name('addCountTeacher')->middleware('permission:create-usera-teacher');
            Route::post('/show/{slugTeacher}/add-acount/', 'storeCountTeacher')->name('storeCountTeacher')->middleware('permission:create-usera-teacher');
        });
    });
    // Routes in Student
    Route::prefix('students')->controller(StudentController::class)->name('students.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-student');
        Route::post('/', 'store')->name('store')->middleware('permission:create-student');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-student');
        Route::get('/show/{coupon}', 'show')->name('show')->middleware('permission:create-student');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-student');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-student');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-student');
        Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
            Route::get('/show/{coupon}/add-acount', 'addCountStudent')->name('addCountStudent')->middleware('permission:create-usera-student');
            Route::post('/show/{slugStudent}/add-acount/', 'storeCountStudent')->name('storeCountStudent')->middleware('permission:create-usera-student');
        });
    });
    // Routes in Subject
    Route::prefix('subjects')->controller(SubjectController::class)->name('subjects.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-subject');
        Route::post('/', 'store')->name('store')->middleware('permission:create-subject');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-subject');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-subject');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-subject');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-subject');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-subject');
    });
    // Routes in Room
    Route::prefix('rooms')->controller(RoomController::class)->name('rooms.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-room');
        Route::post('/', 'store')->name('store')->middleware('permission:create-room');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-room');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-room');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-room');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-room');
    });

    // Routes in Department
    Route::prefix('departments')->controller(DepartmentController::class)->name('departments.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-department');
        Route::post('/', 'store')->name('store')->middleware('permission:create-department');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-department');
        Route::get('/show/{slug}', 'show')->name('show')->middleware('permission:show-department');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-department');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-department');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-department');
        Route::prefix('/show/teachers-department')->controller(Teacher_DepartmentsController::class)->name('teachers-department')->group(function () {
            Route::get('add', 'add')->name('add-teacher-deptement')->middleware('permission:add-teacher-deptement');
            Route::post('/', 'store')->name('store')->middleware('permission:add-teacher-deptement');
            Route::get('/{slug}/{id}/edit', 'edit')->name('edit')->middleware('permission:edit-teacher-deptement');
            Route::put('/{idTeacher}', 'update')->name('update')->middleware('permission:edit-teacher-deptement');
        });
        Route::prefix('/show/grades-department')->controller(Grade__DepartmentsController::class)->name('grades-department')->group(function () {
            Route::get('add', 'add')->name('add-grade-deptement')->middleware('permission:add-grade-deptement');
            Route::post('/', 'store')->name('store')->middleware('permission:add-grade-class');
            Route::get('/{slug}/{id}/edit', 'edit')->name('edit')->middleware('permission:edit-grade-deptement');
            Route::put('/{idGrade}', 'update')->name('update')->middleware('permission:edit-grade-deptement');
        });
    });

    // Routes in Class
    Route::prefix('grades')->controller(GradeController::class)->name('grades.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-class');
        Route::post('/', 'store')->name('store')->middleware('permission:create-class');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-class');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-class');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-class');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-class');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-class');
        Route::prefix('/show/teachers-grade')->controller(Teacher_GradeController::class)->name('teachers-grade')->group(function () {
            Route::get('add-teacher/{slugGrade}', 'add')->name('add-teacher-grade')->middleware('permission:add-teacher-class');
            Route::post('/', 'store')->name('store')->middleware('permission:add-teacher-class');
            Route::get('/{slug}/{id}/edit', 'edit')->name('edit')->middleware('permission:edit-teacher-class');
            Route::put('/{idTeacher}', 'update')->name('update')->middleware('permission:edit-teacher-class');
        });
        Route::prefix('/show/students-grade')->controller(Student_GradeController::class)->name('students-grade')->group(function () {
            Route::get('add', 'add')->name('add-student-grade')->middleware('permission:add-student-class');
            Route::post('/', 'store')->name('store')->middleware('permission:add-student-class');
            Route::get('/{slug}/{id}/edit', 'edit')->name('edit')->middleware('permission:edit-student-class');
            Route::put('/{idStudent}', 'update')->name('update')->middleware('permission:edit-student-class');
        });
    });


    // Routes in Scheldule
    Route::prefix('scheldule')->controller(ScheduleController::class)->name('schedules.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-schedule');
        Route::get('/show/{slug}', 'show')->name('show')->middleware('permission:show-schedule');
        Route::get('/show-user/{slug}', 'showuser')->name('show')->middleware('permission:show-schedule-me');
        Route::prefix('/show/teachers-scheldule')->controller(Teacher_SchelduleController::class)->name('teachers-scheldule.')->group(function () {
            Route::get('/get-periods/{rankId}/{slugTeacher}', 'rank_update_periods')->name('rank-update-periods');
            Route::get('/get-grades/{periodId}', 'getGrades')->name('get-grades');
            Route::get('/get-rooms/{periodId}', 'getRooms')->name('get-rooms');
            Route::get('{slugTeacher}/add', 'add')->name('add-scheldule-teacher')->middleware('permission:create-schedule');
            Route::post('/{slugTeacher}', 'store')->name('store')->middleware('permission:create-schedule');
            Route::get('{slugTeacher}/edit/{id}', 'edit')->name('edit-scheldule-teacher')->middleware('permission:update-schedule');
            Route::post('/{id}/{slugTeacher}', 'update')->name('update')->middleware('permission:update-schedule');
        });
    });

    Route::prefix('scores')->controller(ScoreController::class)->name('scores.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-score');
        Route::get('/show/{slug}', 'showStudentClass')->name('show')->middleware('permission:show-score');
        Route::get('/add/{slug}', 'addScore')->name('addScore')->middleware('permission:create-score');
        Route::post('/add/{slugGrade}', 'add')->name('add')->middleware('permission:create-score');
        Route::get('/show/{slugGrade}/view/{slugStudent}', 'viewScore')->name('viewScore')->middleware('permission:show-score');
        Route::get('/show/{slugGrade}/view/{slugStudent}/edit/{id}', 'editScore')->name('editScore')->middleware('permission:update-score');
        Route::put('/edit/{slugGrade}/{id}', 'update')->name('update')->middleware('permission:update-score');
    });
});
