<?php

use App\Http\Controllers\Module\Authentication\AuthenticationController;
use App\Http\Middleware\CustomAuthMiddleware;
use App\Http\Middleware\CustomGuestMiddleware;
use Illuminate\Support\Facades\Route;




Route::middleware([CustomGuestMiddleware::class])->group(function () {
    Route::get('login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('authenticate', [AuthenticationController::class, 'authenticate'])->name('authenticate');
    Route::get('super-admin/login', [AuthenticationController::class, 'super_admin_login'])->name('super_admin.login');
    Route::post('super-admin/authenticate', [AuthenticationController::class, 'super_admin_authenticate'])->name('super_admin.authenticate');
});


Route::prefix('dashboard')->middleware([
    CustomAuthMiddleware::class
])->group(function () {
    Route::prefix('employee_management')->name('employee_management.')->group(function () {
        require_once "module/employee_management/employee_onboarding/employee_onboarding.php";
        require_once "module/employee_management/employee_termination/employee_termination.php";

    });
    Route::prefix('role_permission')->name('role_permission.')->group(function () {
        require_once "module/role_permission/role_permission.php";
    });

    Route::name('dashboard.')->group(function () {
        require_once "module/dashboard/dashboard.php";
    });

    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});
