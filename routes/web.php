<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Report;
use App\Http\Controllers\AccountSettingsController;
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

Route::middleware(['auth', 'role:0,1'])->group(function () {
    // Route::get('/records', [RecordsController::class, 'index'])->middleware('auth')->name('records');
    // Route::get('/records/create', [RecordsController::class, 'create'])->middleware('auth')->name('create-records');
    // Route::post('/records', [RecordsController::class, 'store'])->name('store-records');
    // Route::get('/records/edit', [RecordsController::class, 'edit'])->middleware('auth')->name('edit-records');
    // Route::delete('/records/delete/{id}', [RecordsController::class, 'delete'])->name('delete-records');

    Route::get('/account-settings', [AccountSettingsController::class, 'index'])->middleware('auth')->name('account-settings');
    Route::get('/account-settings/edit', [AccountSettingsController::class, 'edit'])->middleware('auth')->name('edit-account-settings');
    Route::post('/account-settings/update', [AccountSettingsController::class, 'update'])->middleware('auth')->name('update-account-settings');

});

Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/demographic-report', [Report::class, 'demographic'])->name('demographic-report');
    Route::get('/economic-report', [Report::class, 'economic'])->name('economic-report');
    Route::get('/educational-report', [Report::class, 'educational'])->name('educational-report');
    Route::get('/health-report', [Report::class, 'health'])->name('health-report');
    Route::get('/migration-report', [Report::class, 'migration'])->name('migration-report');

    Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');

    Route::post('/user-management/create-new-user', [UserManagementController::class, 'store'])->name('store-new-user');
    Route::put('/user-management/update-user/{id}', [UserManagementController::class, 'update'])->name('user.update');
    Route::delete('/user-management/delete-user/{id}', [UserManagementController::class, 'delete'])->name('user.delete');

    Route::get('/reports', [Report::class, 'index'])->name('reports');
});