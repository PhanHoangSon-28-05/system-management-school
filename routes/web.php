<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\StudentController;
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
Route::prefix('admin')->middleware('auth')->group(function () {
    // Routes in role
    Route::prefix('roles')->controller(RoleController::class)->name('roles.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{coupon}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
    });

    // Routes in User
    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{coupon}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
    });

    // Routes in Teacher
    Route::prefix('teachers')->controller(TeacherController::class)->name('teachers.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{coupon}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
    });

    // Routes in Department
    Route::prefix('departments')->controller(DepartmentController::class)->name('departments.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{coupon}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
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

    // Routes in Class
    Route::prefix('classes')->controller(ClassController::class)->name('classes.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{coupon}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
    });

    // Routes in Student
    Route::prefix('students')->controller(StudentController::class)->name('students.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{coupon}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::delete('/{coupon}', 'destroy')->name('destroy');
    });
});
