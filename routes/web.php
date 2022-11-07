<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarPenggunaController;
use App\Http\Controllers\DaftarBusController;
use App\Http\Controllers\DaftarAreaController;
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
    Route::get('/daftarbus',[DaftarBusController::class, 'index']);
    Route::get('/daftararea',[DaftarAreaController::class, 'index']);
    Route::post('/daftarbus/tambahbus',[DaftarBusController::class, 'tambahBus']);
    Route::post('/daftarbus/editbus/{id}',[DaftarBusController::class, 'editBus']);
    Route::get('/daftarbus/hapusbus/{id}',[DaftarBusController::class, 'hapusBus']);
    Route::post('/daftararea/tambaharea',[DaftarAreaController::class, 'tambahArea']);
    Route::post('/daftararea/editarea/{id}',[DaftarAreaController::class, 'editArea']);
    Route::get('/daftararea/hapusarea/{id}',[DaftarAreaController::class, 'hapusArea']);
    Route::get('/deleteakun/{id}',[AuthController::class, 'deleteakun']);
    Route::post('/daftarpengguna/edit/{id}',[AuthController::class, 'editakun']);

});

