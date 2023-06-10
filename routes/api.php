<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('user')->name('user.')->group(function () {

    Route::get('create',[UserController::class,'create']);
    Route::post('store',[UserController::class,'store']);

    Route::get('login',[UserController::class,'login']);
    Route::post('check',[UserController::class,'check']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('home',[UserController::class,'info']);
    });
    Route::get('logout',[UserController::class,'logout']);
});
