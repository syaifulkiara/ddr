<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\BellController;
use App\Http\Controllers\JadwalController;

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

// Route::get('/', function () {
//     return view('main');
// });
Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::get('/runtext', [App\Http\Controllers\MainController::class, 'get_runtext'])->name('main.runtext');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/updatetext', [App\Http\Controllers\SettingController::class, 'updatetext'])->name('settings.updatetext');
Route::post('/updatevideo', [App\Http\Controllers\SettingController::class, 'updatevideo'])->name('settings.updatevideo');
Route::resource('users', UserController::class);
Route::resource('settings', SettingController::class);
Route::resource('bells', BellController::class);
Route::resource('audios', AudioController::class);
Route::resource('jadwals', JadwalController::class);