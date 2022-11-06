<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarPenggunaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[HomeController::class, 'index'])->middleware('auth');;
Route::get('/register',[AuthController::class ,'register']);
Route::get('/login',[AuthController::class ,'login'])->name('login');
Route::post('/postregister',[AuthController::class, 'postregister']);
Route::post('/postlogin',[AuthController::class, 'postlogin']);
Route::get('/logout',[AuthController::class, 'logout']);


Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/daftarpengguna',[DaftarPenggunaController::class, 'index']);
});

