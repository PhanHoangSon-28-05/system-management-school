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

        Route::get('/', 'index')->name('index')->middleware('permission:show-role');
        Route::post('/', 'store')->name('store')->middleware('permission:create-role');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-role');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-role');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-role');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-role');
    });
    //

    // Routes in User
    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
    });

    // Routes in Teacher
    Route::prefix('teachers')->controller(TeacherController::class)->name('teachers.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/show/{coupon}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
        Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
            Route::get('/show/{coupon}/add-acount', 'addCountTeacher')->name('addCountTeacher');
            Route::post('/show/{slugTeacher}/add-acount/', 'storeCountTeacher')->name('storeCountTeacher');
        });
    });
    // Routes in Student
    Route::prefix('students')->controller(StudentController::class)->name('students.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/show/{coupon}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
        Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
            Route::get('/show/{coupon}/add-acount', 'addCountStudent')->name('addCountStudent');
            Route::post('/show/{slugStudent}/add-acount/', 'storeCountStudent')->name('storeCountStudent');
        });
    });
    // Routes in Subject
    Route::prefix('subjects')->controller(SubjectController::class)->name('subjects.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{coupon}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
    });
    // Routes in Room
    Route::prefix('rooms')->controller(RoomController::class)->name('rooms.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
    });

    // Routes in Department
    Route::prefix('departments')->controller(DepartmentController::class)->name('departments.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/show/{slug}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
        Route::prefix('/show/teachers-department')->controller(Teacher_DepartmentsController::class)->name('teachers-department')->group(function () {
            Route::get('add', 'add')->name('add-teacher-deptement');
            Route::post('/', 'store')->name('store');
            Route::get('/{slug}/{id}/edit', 'edit')->name('edit');
            Route::put('/{idTeacher}', 'update')->name('update');
        });
        Route::prefix('/show/grades-department')->controller(Grade__DepartmentsController::class)->name('grades-department')->group(function () {
            Route::get('add', 'add')->name('add-grade-deptement');
            Route::post('/', 'store')->name('store');
            Route::get('/{slug}/{id}/edit', 'edit')->name('edit');
            Route::put('/{idGrade}', 'update')->name('update');
        });
    });

    // Routes in Class
    Route::prefix('grades')->controller(GradeController::class)->name('grades.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{coupon}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
        Route::prefix('/show/teachers-grade')->controller(Teacher_GradeController::class)->name('teachers-grade')->group(function () {
            Route::get('add', 'add')->name('add-teacher-grade');
            Route::post('/', 'store')->name('store');
            Route::get('/{slug}/{id}/edit', 'edit')->name('edit');
            Route::put('/{idTeacher}', 'update')->name('update');
        });
        Route::prefix('/show/students-grade')->controller(Student_GradeController::class)->name('students-grade')->group(function () {
            Route::get('add', 'add')->name('add-student-grade');
            Route::post('/', 'store')->name('store');
            Route::get('/{slug}/{id}/edit', 'edit')->name('edit');
            Route::put('/{idStudent}', 'update')->name('update');
        });
    });


    // Routes in Scheldule
    Route::prefix('scheldule')->controller(ScheduleController::class)->name('schedules.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{slug}', 'show')->name('show');
        Route::prefix('/show/teachers-scheldule')->controller(Teacher_SchelduleController::class)->name('teachers-scheldule.')->group(function () {
            Route::get('{slugTeacher}/add', 'add')->name('add-scheldule-teacher');
            Route::get('/get-periods/{rankId}/{slugTeacher}', 'rank_update_periods')->name('rank-update-periods');
            Route::post('/{slugTeacher}', 'store')->name('store');
        });
    });

    Route::prefix('scores')->controller(ScoreController::class)->name('scores.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{slug}', 'showStudentClass')->name('show');
        Route::get('/add/{slug}', 'addScore')->name('addScore');
        Route::post('/add/{slugGrade}', 'add')->name('add');
        Route::get('/show/{slugGrade}/view/{slugStudent}', 'viewScore')->name('viewScore');
        Route::get('/show/{slugGrade}/view/{slugStudent}/edit/{id}', 'editScore')->name('editScore');
        Route::put('/edit/{slugGrade}/{id}', 'update')->name('update');
    });
});
