<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');

        Route::prefix('employee')->group(function () {
            Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
            Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
            Route::post('/create', [EmployeeController::class, 'store']);
            Route::get('/{id}', [EmployeeController::class, 'show']);
            Route::get('/edit/{id}', [EmployeeController::class, 'edit']);
            Route::post('/edit/{id}', [EmployeeController::class, 'update']);
            Route::get('/delete/{id}', [EmployeeController::class, 'destroy']);
        });
    });
});

require __DIR__ . '/auth.php';
