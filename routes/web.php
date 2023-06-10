<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web','prevent-back-history'])->group(function () {
        Route::get('create',[UserController::class,'create']);
        Route::post('store',[UserController::class,'store']);

        Route::get('login',[UserController::class,'login']);
        Route::post('check',[UserController::class,'check']);
    });

    Route::middleware(['auth:web','prevent-back-history'])->group(function () {
        Route::get('home', function () {
            return "home";
        });
    });
    Route::get('logout',[UserController::class,'logout']);
});

Route::prefix('admin')->name('admin.')->group(function () {
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
});
