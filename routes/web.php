<?php

use App\Http\Controllers\backend\CodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\StructureController;
use App\Http\Controllers\backend\EventController;
use App\Http\Controllers\backend\MemberController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function(){
    return view('frontend.home.index');
});

Route::get('send-mail', function () {
    $details = [
        'title' => 'Mail from Presensi Himaster',
        'body' => 'This is for testing email using smtp'
    ];
    $recipient = 'madajabbar22@gmail.com';
    \Mail::to($recipient)->send(new \App\Mail\MyTestMail($details));

    dd("Email is Sent to ". $recipient);
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/input', [App\Http\Controllers\HomeController::class, 'store'])->name('input');
Route::post('/add/event', [App\Http\Controllers\HomeController::class, 'addEvent'])->name('addEvent');
Route::prefix('admin/')->middleware('role')->group(function () {
    Route::get('structure', [StructureController::class,'index'])->name('structure')->middleware('role');
    Route::post('structure/input', [StructureController::class,'create'])->name('structure.input');

    Route::get('event', [EventController::class,'index'])->name('event');
    Route::post('event/input', [EventController::class,'create'])->name('event.input');

    Route::get('code', [CodeController::class,'index'])->name('code');
    Route::post('code/input', [CodeController::class,'create'])->name('code.input');

    Route::get('member', [MemberController::class,'index'])->name('member');
    Route::post('member/input', [MemberController::class,'create'])->name('member.input.event');


    Route::get('about', function () {
        $message = "About";
        return view('backend.adition.about.index',compact('message'));
    })->name('about');

    Route::get('', function () {
        $message = "Dashboard";
        return view('backend.dashboard.index',compact('message'));
    })->name('dashboard');


}
);
