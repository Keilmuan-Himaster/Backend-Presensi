<?php

use App\Http\Controllers\backend\CodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\StructureController;
use App\Http\Controllers\backend\EventController;
use App\Http\Controllers\backend\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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
// dd(Auth::routes());
Route::get('/', [HomeController::class,'index']);
Route::get('test', fn () => phpinfo());
Auth::routes(['verify' => true]);
Route::get('send-mail', function () {
    $details = [
    'title' => 'Mail from ItSolutionStuff.com',
    'body' => 'This is for testing email using smtp'
    ];
    \Illuminate\Support\Facades\Mail::to('madajabbar22@gmail.com')->send(new \App\Mail\MyTestMail($details));
    dd("Email is Sent.");
    });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth','verified');
Route::post('/input', [App\Http\Controllers\HomeController::class, 'store'])->name('input')->middleware('auth','verified');
Route::post('/add/event', [App\Http\Controllers\HomeController::class, 'addEvent'])->name('addEvent')->middleware('auth','verified');
Route::prefix('admin/')->middleware(['role','verified'])->group(function () {
    Route::get('structure', [StructureController::class,'index'])->name('structure')->middleware('role');
    Route::post('structure/input', [StructureController::class,'create'])->name('structure.input');

    Route::get('event', [EventController::class,'index'])->name('event');
    Route::post('event/input', [EventController::class,'create'])->name('event.input');
    Route::post('event/activate/{id}', [EventController::class,'activate']);
    Route::get('event/delete/{id}', [EventController::class,'delete']);

    Route::get('code', [CodeController::class,'index'])->name('code');
    Route::post('code/input', [CodeController::class,'create'])->name('code.input');
    Route::post('code/activate/{id}', [CodeController::class,'activate']);
    Route::get('code/delete/{id}', [CodeController::class,'delete']);
    Route::get('peserta/{id}', [PesertaController::class,'index']);

    Route::get('member', [MemberController::class,'index'])->name('member');
    Route::post('member/input', [MemberController::class,'create'])->name('member.input.event');


    Route::get('about', function () {
        $message = "About";
        return view('backend.adition.about.index',compact('message'));
    })->name('about');

    Route::get('', [DashboardController::class,'index'])->name('dashboard');


}
);
