<?php

use App\Http\Controllers\EmployeeManagement\EmployeeOnboarding\EmployeeOnboardingController;
use Illuminate\Support\Facades\Route;

Route::prefix('employee_onboarding')->name('employee_onboarding.')->group(function () {
    Route::get('index',[EmployeeOnboardingController::class,'index'])->name('index');
    Route::get('create',[EmployeeOnboardingController::class,'create'])->name('modal.create');
    Route::post('store',[EmployeeOnboardingController::class,'store'])->name('store');
    Route::get('data',[EmployeeOnboardingController::class,'data'])->name('data');
    Route::get('edit/{id}',[EmployeeOnboardingController::class,'edit'])->name('modal.edit');
    Route::post('update/{id}',[EmployeeOnboardingController::class,'update'])->name('update');
});
