<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('index',[UserController::class,'index']);
    Route::post('post',[UserController::class,'post']);
    Route::post('addEvent',[UserController::class,'addEvent']);
    Route::post('logout',[UserController::class,'logout']);
});
Route::post('/cek', [UserController::class, 'cek']);
