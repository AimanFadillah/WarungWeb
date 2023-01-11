<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashbordController;

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

// home
Route::get('/',[HomeController::class,'index']);
Route::get('/beranda',[HomeController::class,'index']);

// login
Route::get('/login',[LoginController::class,'index'])->middleware('guest');
Route::post('/login',[LoginController::class,'verifikasi']);
Route::post('/logout',[LoginController::class,'logout']);

// Dashbord
Route::resource('/dashbord/barang',DashbordController::class)->middleware('auth');

