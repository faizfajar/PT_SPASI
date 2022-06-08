<?php

use App\Http\Controllers\FibonnaciController;
use App\Http\Controllers\UserController;
use App\Models\Users;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\UserController;


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
    return view('welcome');
});


Route::resource('users', UserController::class);

// route::get('users', [UserController::class ,'index'])->name('users.index');


Route::get('/login', [LoginController::class, 'view'])->name('login.showview');
Route::post('/login', [LoginController::class, 'attempt'])->name('login.attempt');


Route::get('/fibonacci', function () {
    return view('fibonnaci.create');
});

Route::post('/fibonacci/buat', FibonnaciController::class)->name('fibonacci.buat');