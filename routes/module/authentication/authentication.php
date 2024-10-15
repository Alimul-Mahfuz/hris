<?php

use App\Http\Controllers\Module\Authentication\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('login',[AuthenticationController::class,'index'])->name('login');
Route::post('authenticate',[AuthenticationController::class,'authenticate'])->name('authenticate');
