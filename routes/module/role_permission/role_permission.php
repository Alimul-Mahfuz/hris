<?php

use App\Http\Controllers\RolePermission\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::get('index',[RolePermissionController::class,'index'])->name('index');
Route::get('create',[RolePermissionController::class,'create'])->name('modal.create');
