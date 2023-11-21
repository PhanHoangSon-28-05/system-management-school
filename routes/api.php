<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Api\Admin\ApiRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard');




Route::prefix('roles')->controller(ApiRoleController::class)->name('roles.')->group(function () {
    Route::post('/', 'store')->name('store');
    Route::get('/{coupon}', 'show')->name('show');
    Route::put('/{coupon}', 'update')->name('update');
    Route::delete('/{coupon}', 'destroy')->name('destroy');
});
