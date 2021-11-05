<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\StructureController;
use App\Http\Controllers\backend\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $message = "Dashboard";
    return view('backend.dashboard.index',compact('message'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('structure', [StructureController::class,'index'])->name('structure');
    Route::post('structure/input', [StructureController::class,'create'])->name('structure.input');

    Route::get('event', [EventController::class,'index'])->name('event');
    Route::post('event/input', [EventController::class,'create'])->name('event.input');
});
