<?php


use App\Http\Controllers\EmployeeManagment\EmployeeTermination\EmployeeTerminationController;
use Illuminate\Support\Facades\Route;

Route::prefix('employee_termination')->name('employee_termination.')->group(function () {
    Route::get('index',[EmployeeTerminationController::class,'index'])->name('index');
});
