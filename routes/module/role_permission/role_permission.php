<?php

use App\Http\Controllers\RolePermission\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::get('index',[RolePermissionController::class,'index'])->name('index');
Route::get('create',[RolePermissionController::class,'create'])->name('modal.create');
Route::post('store',[RolePermissionController::class,'store'])->name('store');
Route::get('edit',[RolePermissionController::class,'update'])->name('modal.edit');
Route::put('update',[RolePermissionController::class,'update'])->name('update');
