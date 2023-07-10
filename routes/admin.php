<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:admin','prevent-back-history'])->group(function () {
    Route::get('create',[AdminController::class,'create']);
    Route::post('store',[AdminController::class,'store']);

    Route::get('login',[AdminController::class,'login']);
    Route::post('check',[AdminController::class,'check']);
});

Route::middleware(['auth:admin','prevent-back-history'])->group(function () {
    Route::get('home', function () {
        return "home";
    });
    Route::get('logout',[AdminController::class,'logout']);
});
