<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Report;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\Auth\LoginController;
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
Route::middleware(['web'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

Route::get('/demographic-report', [Report::class, 'demographic'])->name('demographic-report');
Route::get('/economic-report', [Report::class, 'economic'])->name('economic-report');
Route::get('/educational-report', [Report::class, 'educational'])->name('educational-report');
Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');

Route::post('/user-management/create-new-user', [UserManagementController::class, 'store'])->name('store-new-user');
Route::put('/user-management/update-user/{id}', [UserManagementController::class, 'update'])->name('user.update');
Route::delete('/user-management/delete-user/{id}', [UserManagementController::class, 'delete'])->name('user.delete');

Route::get('/reports', [Report::class, 'index'])->name('reports');

