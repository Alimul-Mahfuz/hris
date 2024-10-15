<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('modules.dashboard.index');
});


Route::prefix('authentication')->group(function () {
    require_once "module/authentication/authentication.php";
});

Route::prefix('dashboard')->group(function () {
    Route::prefix('employee_management')->name('employee_management.')->group(function () {
        require_once "module/employee_management/employee_onboarding/employee_onboarding.php";
        require_once "module/employee_management/employee_termination/employee_termination.php";

    });
    Route::prefix('role_permission')->name('role_permission.')->group(function () {
        require_once "module/role_permission/role_permission.php";
    });
});
